import React, {useState} from 'react';
import {Form, Input, Button, Space, Row, Col} from 'antd';
import Title from "antd/es/typography/Title";
import axios from '../../../main/axios';
import IssuerSelect from "../../../library/common/components/issuer-select";

const AddClientModal = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                create_client: values
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
        <Form
            form={form}
            name="basic"
            layout="vertical"
            onFinish={onFinish}
            onFinishFailed={onFinishFailed}
            autoComplete="off"
        >
            <Title level={5}>Dodaj nowego klienta</Title>

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

            <Row gutter={16}>
                <Col span={12}>
                    <Form.Item
                        label="Wystawca faktury"
                        name="issuerAddress"
                        rules={[
                            {
                                required: true,
                            },
                        ]}
                    >
                        <IssuerSelect />
                    </Form.Item>
                </Col>
            </Row>

            <Form.Item>
                <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                    <Space>
                        <Button type="default" onClick={props.close} disabled={loading}>
                            Anuluj
                        </Button>

                        <Button type="primary" htmlType="submit" loading={loading}>
                            Dalej
                        </Button>
                    </Space>
                </div>
            </Form.Item>
        </Form>
    )
}

export default AddClientModal;