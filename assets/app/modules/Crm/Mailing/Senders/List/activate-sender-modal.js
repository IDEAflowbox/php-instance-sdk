import React, {useState} from 'react';
import {Form, Input, Button, Space, Row, Col, Table, InputNumber} from 'antd';
import axios from "../../../../../main/axios";
import notifications from "../../../../../library/common/components/notifications";

const ActivateSenderModal = (props) => {
    const [loading, setLoading] = useState(false);
    const [form] = Form.useForm();

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                senderId: props.senderId,
                code: values.code
            })
            .then(response => {
                window.location.reload();
            })
            .catch(error => {
                notifications.error('Kod aktywacyjny jest niepoprawny.')
                setLoading(false);
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
                    <Form.Item
                        label="Wprowadź kod aktywacyjny"
                        name="code"
                        rules={[
                            {
                                required: true
                            },
                        ]}
                    >
                        <InputNumber min={100000} max={999999} style={{width: '100%'}} />
                    </Form.Item>
                </Col>

                <Col span={24}>
                    <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                        <Space>
                            <Button type="default" onClick={props.close} disabled={loading}>
                                Anuluj
                            </Button>

                            <Button type="primary" htmlType="submit" loading={loading}>
                                Aktywuj
                            </Button>
                        </Space>
                    </div>
                </Col>
            </Row>
        </Form>
    );
}

export default ActivateSenderModal;