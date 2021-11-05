import React, {useState} from 'react';
import Content from "../../../../library/common/components/content";
import {SaveOutlined} from "@ant-design/icons";
import {Button, Col, Form, Input, Row, Space} from "antd";
import axios from "../../../../main/axios";
import Title from "antd/es/typography/Title";
import Tabs from "../tabs";

const BillingDetails = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                billing_details: values
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

            <Tabs activeKeys={['billing']} />

            <Form
                form={form}
                name="basic"
                layout="vertical"
                onFinish={onFinish}
                onFinishFailed={onFinishFailed}
                autoComplete="off"
                initialValues={props.billingAddress}
            >
                <Content style={{marginBottom: 20}}>
                    <Row gutter={16}>
                        <Col span={12}>
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
                        <Col span={12}>
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
                        <Col span={12}>
                            <Form.Item
                                label="Nazwa firmy"
                                name="companyName"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                        <Col span={12}>
                            <Form.Item
                                label="NIP"
                                name="taxId"
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
                        <Col span={12}>
                            <Form.Item
                                label="Ulica"
                                name="street"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                        <Col span={12}>
                            <Form.Item
                                label="Numer"
                                name="propertyNumber"
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
                        <Col span={12}>
                            <Form.Item
                                label="Miasto"
                                name="city"
                                rules={[
                                    {
                                        required: true
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                        <Col span={12}>
                            <Form.Item
                                label="Kod pocztowy"
                                name="zipCode"
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
                        <Col span={12}>
                            <Form.Item
                                label="Kraj"
                                name="country"
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
                </Content>

                <Content style={{marginBottom: 20}}>
                    <Title level={4}>Dane karty płatniczej</Title>

                    <Row gutter={16}>
                        <Col span={12}>
                            <Form.Item
                                label="Imię"
                                name="firstName"
                                rules={[
                                    {
                                        required: false,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                        <Col span={12}>
                            <Form.Item
                                label="Nazwisko"
                                name="lastName"
                                rules={[
                                    {
                                        required: false,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                    </Row>

                    <Row gutter={16}>
                        <Col span={12}>
                            <Form.Item
                                label="Nazwa firmy"
                                name="companyName"
                                rules={[
                                    {
                                        required: false,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>
                        <Col span={6}>
                            <Form.Item
                                label="MM/YY"
                                name="date"
                                rules={[
                                    {
                                        required: false,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
                        </Col>

                        <Col span={6}>
                            <Form.Item
                                label="CCV"
                                name="ccv"
                                rules={[
                                    {
                                        required: false,
                                    },
                                ]}
                            >
                                <Input />
                            </Form.Item>
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

export default BillingDetails;