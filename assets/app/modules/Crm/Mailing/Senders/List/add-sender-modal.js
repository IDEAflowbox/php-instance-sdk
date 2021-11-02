import React, {useState} from 'react';
import {Form, Input, Button, Space, Row, Col, Table, InputNumber} from 'antd';
import axios from "../../../../../main/axios";
import notifications from "../../../../../library/common/components/notifications";
import Title from "antd/es/typography/Title";
import {createModal} from "../../../../../library/common/components/modal";
import ActivateSenderModal from "./activate-sender-modal";

const AddSenderModal = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        console.log(values);
        setLoading(true);

        axios
            .post(window.location.href, {
                create_sender: values
            })
            .then(response => {
                // window.location.reload();
                props.close();
                const modal = createModal({
                    width: '90%',
                    style: {maxWidth: 480},
                    content: <ActivateSenderModal close={() => modal.destroy()} senderId={response.data.id}/>
                });
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

    return (
        <Form
            form={form}
            name="basic"
            layout="vertical"
            onFinish={onFinish}
            // onFinishFailed={onFinishFailed}
            autoComplete="off"
        >
            <Row>
                <Col span={24}>
                    <Title level={4}>Dodaj nadawcę</Title>
                </Col>

                <Col span={24}>
                    <Form.Item
                        label="Nazwa"
                        name="name"
                        rules={[
                            {
                                required: true
                            },
                        ]}
                    >
                        <Input />
                    </Form.Item>
                </Col>

                <Col span={24}>
                    <Form.Item
                        label="Adres e-mail"
                        name="email"
                        rules={[
                            {
                                required: true
                            },
                        ]}
                    >
                        <Input />
                    </Form.Item>
                </Col>

                <Col span={24}>
                    <Title level={4}>Dane do serwera SMTP</Title>
                </Col>

                <Col span={6}>
                    <Form.Item
                        label="Port"
                        name="port"
                        initialValue={25}
                    >
                        <InputNumber />
                    </Form.Item>
                </Col>

                <Col span={18}>
                    <Form.Item
                        label="Nazwa hosta"
                        name="host"
                    >
                        <Input />
                    </Form.Item>
                </Col>

                <Col span={24}>
                    <Form.Item
                        label="Login"
                        name="username"
                    >
                        <Input />
                    </Form.Item>
                </Col>

                <Col span={24}>
                    <Form.Item
                        label="Hasło"
                        name="password"
                    >
                        <Input.Password />
                    </Form.Item>
                </Col>

                <Col span={24}>
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
                </Col>
            </Row>
        </Form>
    );
}

export default AddSenderModal;