import React, {useState} from 'react';
import {Button, Col, Row, Popconfirm, Space, Table, Typography} from "antd";
import Content from "../../../library/common/components/content";
import List from "../../../library/common/components/list";
import InvoiceDetails from "./invoice-details";
import ExternalApiDetails from './external-api-details';
import {createModal} from "../../../library/common/components/modal";
import AddUserModal from "./add-user-modal";
import {DeleteOutlined, PlusOutlined} from "@ant-design/icons";
import Show from "../../../library/common/components/show";

const {Title} = Typography;

const Details = (props) => {
    const data = [
        {
            name: 'Imię i nazwisko',
            value: props.name
        },
        {
            name: 'Nazwa firmy',
            value: props.companyName,
        },
        {
            name: 'NIP',
            value: props.taxId,
        },
        {
            name: 'Adres',
            value: props.address,
        },
        {
            name: 'Saldo klienta',
            value: 'Opłacone'
        },
    ]
    return (
        <List data={data}/>
    )
}

const ClientDetails = (props) => {
    const {users, billing_address} = props.client;
    const {first_name, last_name, companyName, taxId} = billing_address;

    const handleNewUser = () => {
        const modal = createModal({
            width: '90%',
            style: {maxWidth: 480},
            content: <AddUserModal close={() => modal.destroy()}/>,
        });
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={24}>
                    <Title level={4}><a href="/admin/client/list">Lista klientów</a> / {first_name} {last_name}</Title>
                </Col>
            </Row>
            <Row style={{marginBottom: 20}}>
                <Col span={24}>
                    <Content>
                        <Row>
                            <Col span={12}>
                                <Title level={4}>{first_name} {last_name}</Title>
                            </Col>
                            <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                                <Show condition={props.switch_user_url}>
                                    <Button href={props.switch_user_url}>
                                        Przejdź do panelu klienta
                                    </Button>
                                </Show>
                            </Col>
                        </Row>
                        <Row>
                            <Col span={24}>
                                <Details
                                    name={`${first_name} ${last_name}`}
                                    companyName={companyName}
                                    taxId={taxId}
                                    address={`${billing_address?.street} ${billing_address?.property_number}, ${billing_address?.zip_code} ${billing_address?.city}, ${billing_address?.country}`}
                                />
                            </Col>
                        </Row>
                    </Content>
                </Col>
            </Row>

            <Row style={{marginBottom: 20}}>
                <Col span={24}>
                    <ExternalApiDetails
                        client={props.client}
                    />
                </Col>
            </Row>

            <Row style={{marginBottom: 20}}>
                <Col span={24}>
                    <InvoiceDetails client={props.client}/>
                </Col>
            </Row>

            <Row>
                <Col span={12}>
                    <Title level={4}>Lista użytkowników</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button type="default" icon={<PlusOutlined />} onClick={handleNewUser}>
                        Dodaj nowego użytkownika
                    </Button>
                </Col>

                <Col span={24}>
                    <Table
                        dataSource={users}
                        size="small"
                        pagination={false}
                        columns={[
                            {
                                key: 'name',
                                title: 'Imię i nazwisko',
                                render: (_, user) => `${user.first_name} ${user.last_name}`
                            },
                            {
                                key: 'email',
                                title: 'E-mail',
                                render: (_, user) => user.email
                            },
                            {
                                key: 'action',
                                title: '',
                                align: 'right',
                                render: (_, user) => {
                                    const handleConfirm = () => {
                                        window.location.href = `/admin/client/${props.client.id.uid}/user/${user.id.uid}/remove`;
                                    }

                                    return (
                                        <Popconfirm onConfirm={handleConfirm} title="Na pewno chcesz usunąć użytkownika?" okText="Tak" cancelText="Anuluj">
                                            <Button type="danger">
                                                <DeleteOutlined/>
                                            </Button>
                                        </Popconfirm>
                                    )
                                }
                            }
                        ]}
                        rowKey={user => user.id.uid}
                    />
                </Col>
            </Row>
        </>
    )
}

export default ClientDetails;