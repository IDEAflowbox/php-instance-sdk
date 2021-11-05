import React, {useState} from 'react';
import {Button, Col, Form, Input, Row, Typography} from 'antd';
import Tabs from "../tabs";
import Content from "../../../library/common/components/content";
import {SaveOutlined} from "@ant-design/icons";
import PredefinedFeaturesSelect from "../../../library/common/components/predefined-features-select";
import axios from "../../../main/axios";
import notifications from "../../../library/common/components/notifications";

const {Title} = Typography;

const MappingFeatures = (props) => {
    console.log(props);
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();
    const [features, setFeatures] = useState(props.features);

    const onFinish = (values) => {
        setLoading(true);
        const associations = [];

        Object.keys(values).map(choiceId => {
            associations.push({
                choiceId: choiceId,
                associatedTo: values[choiceId].associatedTo,
            })
        });

        console.log(associations);

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

    let missingFeatures = 0;
    features.forEach(f => missingFeatures += f.choices.filter(c => !c.associatedTo).length)

    return (
        <>
            <Tabs activeKeys={['features']} missingFeatures={missingFeatures}/>
            <Title level={2}>Mapowanie atrybutów</Title>

            <Form
                form={form}
                name="basic"
                layout="vertical"
                onFinish={onFinish}
                autoComplete="off"
            >
                {features.map(feature => (
                    <Content style={{marginBottom: 20}} key={`feature-${feature.id}`}>
                        <Row gutter={32} style={{marginBottom: 10}}>
                            <Col span={24}>
                                <Title level={2}>Atrybut: {feature.name}</Title>
                            </Col>
                            <Col span={12}><strong>Klasyfikacja na stronie</strong></Col>
                            <Col span={12}><strong>Klasyfikacja w systemie</strong></Col>
                        </Row>

                        {feature.choices.map((choice) => (
                            <Row gutter={32} key={`feature-${feature.id}-${choice.id}`}>
                                <Col span={12}>
                                    <Form.Item
                                        label=""
                                        name={[choice.id, "name"]}
                                        initialValue={choice.name}
                                    >
                                        <Input readOnly={true} style={!choice.associatedTo ? {border: '2px solid #000', backgroundColor: 'rgba(235, 87, 87, 0.25)'} : {}} />
                                    </Form.Item>
                                </Col>
                                <Col span={12}>
                                    <Form.Item
                                        label=""
                                        name={[choice.id, "associatedTo"]}
                                        initialValue={choice.associatedTo ? choice.associatedTo : undefined}
                                    >
                                        <PredefinedFeaturesSelect placeholder="-" />
                                    </Form.Item>
                                </Col>
                            </Row>
                        ))}

                    </Content>
                ))}

                <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                    <Button type="primary" htmlType="submit" loading={loading} icon={<SaveOutlined />}>
                        Zatwierdź
                    </Button>
                </div>
            </Form>
        </>
    )
}

export default MappingFeatures;