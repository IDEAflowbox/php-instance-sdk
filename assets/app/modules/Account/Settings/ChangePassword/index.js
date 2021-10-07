import React, {useState} from 'react';
import Content from "../../../../library/common/components/content";
import TabsSwitch from "../../../../library/common/components/tabs-switch";
import {CreditCardOutlined, LockOutlined, RollbackOutlined, SaveOutlined, UserOutlined} from "@ant-design/icons";
import {Button, Col, Form, Input, Row, Space} from "antd";
import axios from "../../../../main/axios";

const ChangePassword = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                account_change_password: {
                    password: values.password,
                    plainPassword: {
                        first: values.newPassword,
                        second: values.confirm,
                    }
                }
            })
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                setLoading(false);
                const errors = error.response.data.form.errors.children;
                const errorsKeys = Object.keys(errors);
                const fields = [];

                if (errors.plainPassword?.children?.first?.errors) {
                    fields.push({
                        name: 'newPassword',
                        value: form.getFieldValue('newPassword'),
                        errors: errors.plainPassword?.children?.first?.errors,
                    })
                }

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
            >
                <Content style={{marginBottom: 20}}>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                label="Stare hasło"
                                name="password"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input.Password />
                            </Form.Item>
                        </Col>
                    </Row>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                label="Nowe hasło"
                                name="newPassword"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input.Password />
                            </Form.Item>
                        </Col>
                    </Row>
                    <Row gutter={16}>
                        <Col span={8}>
                            <Form.Item
                                dependencies={['newPassword']}
                                label="Powtórz hasło"
                                name="confirm"
                                rules={[
                                    {
                                        required: true
                                    },
                                    ({ getFieldValue }) => ({
                                        validator(_, value) {
                                            if (!value || getFieldValue('newPassword') === value) {
                                                return Promise.resolve();
                                            }
                                            return Promise.reject(new Error('The two passwords that you entered do not match!'));
                                        },
                                    }),
                                ]}
                            >
                                <Input.Password />
                            </Form.Item>
                        </Col>
                    </Row>
                </Content>

                <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                    <Space>
                        <Button href="/account/settings/account" icon={<RollbackOutlined />}>
                            Powrót
                        </Button>

                        <Button type="primary" htmlType="submit" loading={loading} icon={<SaveOutlined />}>
                            Zatwierdź
                        </Button>
                    </Space>
                </div>
            </Form>
        </>
    )
}

export default ChangePassword;