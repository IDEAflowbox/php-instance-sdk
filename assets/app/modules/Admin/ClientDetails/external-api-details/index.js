import React, {useState} from 'react';
import {Button, Col, Form, Input, Row, Typography} from "antd";
import TokenViewer from "../../../../library/common/components/token-viewer";
import Content from "../../../../library/common/components/content";
import List from "../../../../library/common/components/list";
import axios from "../../../../main/axios";
import notifications from "../../../../library/common/components/notifications";

const {Title} = Typography;

const ExternalApiDetails = (props) => {
    const [editing, setEditing] = useState(false);
    const [externalApiConfig, setExternalApiConfig] = useState(props.client.external_api_config);
    const [loading, setLoading] = useState(false);

    const data = [
        {
            name: 'Adres do API',
            value: externalApiConfig?.url,
            render: (url) => {
                if(editing) {
                    return (
                        <Form.Item name="url" noStyle={true}>
                            <Input/>
                        </Form.Item>
                    )
                }

                return url;
            },
        },
        {
            name: 'Token',
            value: externalApiConfig?.token,
            render: (token) => {
                if (editing) {
                    return (
                        <Form.Item name="token" noStyle={true}>
                            <Input />
                        </Form.Item>
                    )
                }
                return <TokenViewer token={token}/>;
            },
        }
    ];

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(`/admin/client/${props.client.id.uid}/api/edit`, {
                external_api_config: values
            })
            .then(() => {
                setExternalApiConfig({
                    ...externalApiConfig,
                    ...values
                });
                setLoading(false);
                setEditing(false);
                notifications.success('Dane zostały zapisane.');
            })
        ;
    }

    return (
        <Content>
            <Form
                initialValues={externalApiConfig}
                onFinish={onFinish}
            >
                <Row>
                    <Col span={12}>
                        <Title level={4}>Dane do API</Title>
                    </Col>
                    <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                        {
                            editing ? (
                                <Form.Item noStyle={true}>
                                    <Button type="primary" htmlType="submit" loading={loading}>
                                        Zapisz
                                    </Button>
                                </Form.Item>
                            ) : (
                                <Button onClick={() => setEditing(true)}>
                                    Edytuj
                                </Button>
                            )
                        }
                    </Col>
                </Row>
                <Row>
                    <Col span={24}>
                        <List data={data}/>
                    </Col>
                </Row>
            </Form>
        </Content>
    )
}

export default ExternalApiDetails;