import React, {useState} from 'react';
import Content from "../../../../library/common/components/content";
import TabsSwitch from "../../../../library/common/components/tabs-switch";
import {CreditCardOutlined, LockOutlined, SaveOutlined, UserOutlined} from "@ant-design/icons";
import {Button, Col, Form, Input, Row, Space} from "antd";
import axios from "../../../../main/axios";

const AccountDetails = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                account_details: values
            })
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                setLoading(false);
                const errors = error.response.data.form.errors.children;
                const errorsKeys = Object.keys(errors);
                const fields = [];


                errorsKeys.forEach(input => {
                    fields.push({
                        name: input,
                        value: values[input],
                        errors: errors[input].errors ? errors[input].errors : []
                    })
                })
                form.setFields(fields);
            })
    };

    const onFinishFailed = (errorInfo) => {
    };

    return (
        <>
            <TabsSwitch
                items={[
                    {
                        key: 'account',
                        title: 'Dane konta',
                        prefix: <UserOutlined />,
                        onClick: (item, index) => window.location.href = '/account/settings/account',
                    },
                    {
                        key: 'billing',
                        title: 'Dane rozliczeniowe',
                        prefix: <CreditCardOutlined />,
                        onClick: (item, index) => window.location.href = '/account/settings/billing',
                    }
                ]}
                activeKeys={['account']}
            />

            <Form
                form={form}
                name="basic"
                layout="vertical"
                onFinish={onFinish}
                onFinishFailed={onFinishFailed}
                autoComplete="off"
                initialValues={props.user}
            >
                <Content style={{marginBottom: 20}}>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                label="Imię"
                                name="firstName"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                    </Row>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                label="Nazwisko"
                                name="lastName"
                                rules={[
                                    {
                                        required: true,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                    </Row>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                label="E-mail"
                                name="email"
                                rules={[
                                    {
                                        required: true,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                    </Row>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Button href="/account/settings/account/change-password" icon={<LockOutlined />} block>
                                Zmień hasło
                            </Button>
                        </Col>
                    </Row>
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

export default AccountDetails;