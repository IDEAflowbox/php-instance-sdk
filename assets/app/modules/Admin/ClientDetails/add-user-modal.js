import React, {useState} from 'react';
import {Form, Input, Button, Space} from 'antd';
import Title from "antd/es/typography/Title";
import axios from '../../../main/axios';

const AddUserModal = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                user: values
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
            <Title level={5}>Dodaj nowego użytkownika</Title>

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

            <Form.Item
                label="Hasło"
                name="plainPassword"
                rules={[
                    {
                        required: true,
                    },
                ]}
            >
                <Input.Password />
            </Form.Item>

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

export default AddUserModal;