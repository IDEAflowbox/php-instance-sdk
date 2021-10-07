import React, {useState} from 'react';
import {Button, Col, Form, Input, InputNumber, Row, Table, Typography} from "antd";
import {DeleteOutlined, PlusCircleOutlined} from "@ant-design/icons";
import Content from "../../../../library/common/components/content";
import IssuerSelect from "../../../../library/common/components/issuer-select";
import List from "../../../../library/common/components/list";
import columns from "./_columns";
import {AppContext} from "../../../../library/common/providers/app/context";
import axios from "../../../../main/axios";
import notifications from "../../../../library/common/components/notifications";

const {Title, Paragraph} = Typography;

const InvoiceDetails = (props) => {
    const {billing_address, billing_option, billing_items} = props.client;
    const [editing, setEditing] = useState(false);
    const [loading, setLoading] = useState(false);

    const [dataSource, setDataSource] = useState({
        items: billing_items,
        issuer_address_id: billing_option.issuer_address.id.uid
    });

    const handleAddItem = () => {
        const ds = {
            ...dataSource,
            items: [
                ...dataSource.items,
                {
                    key: dataSource.items.length+1,
                    name: '',
                    quantity: 0,
                    unit_price: 0,
                    vat_rate: 0,
                    id: {
                        uid: String(Math.random())
                    }
                }
            ]
        }
        setDataSource(ds)
    }

    const onFinish = (values) => {
        const items = dataSource.items.map(item => {
            return {
                ...item,
                ...values.item[item.id.uid]
            }
        })

        setDataSource({
            issuer_address_id: values.issuer_address_id,
            items
        });
        setLoading(true);

        axios
            .post(`/admin/client/${props.client.id.uid}/billing-items/edit`, {
                client_billing_items: {
                    billingOption: {
                        issuerAddress: values.issuer_address_id
                    },
                    billingItems: items.map(item => ({
                        name: item.name,
                        quantity: item.quantity,
                        unitPrice: (item.unit_price/100),
                        vatRate: item.vat_rate,
                    }))
                }
            })
            .then(() => {
                setEditing(false);
                setLoading(false);
                notifications.success('Dane zostały zapisane.');
            })
        ;
    };

    const handleDelete = (index) => {
        const items = dataSource.items;
        items.splice(index, 1);
        setDataSource({
            ...setDataSource,
            items: [...items]
        });
    }

    const summary = {
        net: 0,
        gross: 0,
        vat: 0,
    }

    dataSource.items.forEach(item => {
        summary.net += item.unit_price*item.quantity;
        summary.vat += item.unit_price*(item.vat_rate/100)*item.quantity;
        summary.gross = summary.net+summary.vat;
    })

    return (
        <Content>
            <Form
                initialValues={dataSource}
                onFinish={onFinish}
            >
                <Row>
                    <Col span={12}>
                        <Title level={4}>Pozycje na fakturze</Title>
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
                        <Row style={{marginBottom: 20}}>
                            <Col span={24}>
                                <Table size="small" pagination={false} dataSource={dataSource.items} columns={columns(editing, handleDelete)} style={{marginBottom: 20}} rowKey={item => item.id.uid}/>
                                {
                                    editing ? <Button icon={<PlusCircleOutlined />} onClick={handleAddItem}>Dodaj pozycję</Button> : null
                                }
                            </Col>
                        </Row>
                        <Row>
                            <Col span={12}>
                                <Title level={5} style={{padding: 3, background: '#f7f7f7', textTransform: 'uppercase'}}>Wystawca faktury</Title>
                                {
                                    editing ? (
                                        <Form.Item name="issuer_address_id" noStyle={true}>
                                            <IssuerSelect />
                                        </Form.Item>
                                    ) : (
                                        <AppContext.Consumer>
                                            {value => <Paragraph>{value.issuers_addresses.find(a => a.id === dataSource.issuer_address_id).name}</Paragraph>}
                                        </AppContext.Consumer>
                                    )
                                }
                            </Col>
                            <Col span={12}>
                                <Title level={5} style={{padding: 3, background: '#f7f7f7', textTransform: 'uppercase'}}>Podsumowanie</Title>
                                <List
                                    data={[
                                        {
                                            name: 'Razem netto',
                                            value: summary.net,
                                            render: (price) => `${price.toFixed(2)} zł`,
                                        },
                                        {
                                            name: 'VAT',
                                            value: summary.vat,
                                            render: (price) => `${price.toFixed(2)} zł`,
                                        },
                                        {
                                            name: 'Razem Brutto',
                                            value: summary.gross,
                                            render: (price) => `${price.toFixed(2)} zł`,
                                        }
                                    ]}
                                />
                            </Col>
                        </Row>
                    </Col>
                </Row>
            </Form>
        </Content>
    )
}

export default InvoiceDetails;