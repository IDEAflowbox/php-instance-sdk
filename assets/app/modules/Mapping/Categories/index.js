import React, {useState} from 'react';
import {Button, Col, Form, Input, Row, Space, Typography} from 'antd';
import Tabs from "../tabs";
import {ContactsOutlined, RollbackOutlined, SaveOutlined} from "@ant-design/icons";
import Content from "../../../library/common/components/content";
import axios from "../../../main/axios";
import PredefinedCategoriesSelect from "../../../library/common/components/predefined-categories-select";
import notifications from "../../../library/common/components/notifications";

const {Title} = Typography;

const MappingCategories = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();
    const [categories, setCategories] = useState(props.categories);

    const onFinish = (values) => {
        setLoading(true);
        const associations = [];

        Object.keys(values).map(categoryId => {
            let category = categories.find(c => c.id === categoryId.toString())
            category.associatedTo = values[categoryId].associatedTo;

            setCategories([...categories]);

            associations.push({
                categoryId: categoryId,
                associatedTo: values[categoryId].associatedTo,
            })
        });

        axios
            .post(window.location.href, {associations})
            .then(response => {
                setLoading(false);
                notifications.success('Dane zostały zapisane.');
            })
            .catch(() => {
                setLoading(false);
                notifications.error('Wystąpił nieoczekiwany błąd');
            })
        ;
    };

    return (
        <>
            <Tabs activeKeys={['categories']} missingCategories={categories.filter(c => !c.associatedTo).length}/>

            <Title level={2}>Mapowanie kategorii</Title>

            <Form
                form={form}
                name="basic"
                layout="vertical"
                onFinish={onFinish}
                autoComplete="off"
            >
                <Content style={{marginBottom: 20}}>
                    <Row gutter={32} style={{marginBottom: 10}}>
                        <Col span={12}><strong>Klasyfikacja na stronie</strong></Col>
                        <Col span={12}><strong>Klasyfikacja w systemie</strong></Col>
                    </Row>

                    {categories.map((category) => (
                        <Row gutter={32} key={`association-row-${category.id}`}>
                            <Col span={12}>
                                <Form.Item
                                    label=""
                                    name={[category.id, "name"]}
                                    initialValue={category.name}
                                >
                                    <Input readOnly={true} style={!category.associatedTo ? {border: '2px solid #000', backgroundColor: 'rgba(235, 87, 87, 0.25)'} : {}}/>
                                </Form.Item>
                            </Col>
                            <Col span={12}>
                                <Form.Item
                                    label=""
                                    name={[category.id, "associatedTo"]}
                                    initialValue={category.associatedTo ? category.associatedTo : undefined}
                                >
                                    <PredefinedCategoriesSelect placeholder="-" />
                                </Form.Item>
                            </Col>
                        </Row>
                    ))}

                </Content>

                <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                    <Button type="primary" htmlType="submit" loading={loading} icon={<SaveOutlined />}>
                        Zatwierdź
                    </Button>
                </div>
            </Form>
        </>
    )
}

export default MappingCategories;