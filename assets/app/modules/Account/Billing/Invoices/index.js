import React, {useState} from 'react';
import Content from "../../../../library/common/components/content";
import Tabs from "../tabs";
import {Badge, Button, Col, Input, Row, Space, Typography} from 'antd';
import ListView from "../../../../library/common/components/list-view";
import columns from "./_columns";
import {DownloadOutlined, PlusOutlined, SearchOutlined} from "@ant-design/icons";
import List from "../../../../library/common/components/list";
import moment from 'moment';
import currency from 'currency.js';

const {Title} = Typography;

const Last = (props) => {
    const {invoice} = props;
    if (!invoice) return null;

    const data = [
        {
            name: 'Numer',
            value: invoice.number
        },
        {
            name: 'Data wystwienia',
            value: moment(invoice.issuedAt).format('DD-MM-YYYY'),
        },
        {
            name: 'Termin płatności',
            value: moment(invoice.dueDate).format('DD-MM-YYYY'),
        },
        {
            name: 'Konto bankowe',
            value: invoice.bankAccount,
        },
        {
            name: 'Status',
            value: invoice.paid ? <Badge status="success" text="Opłacony" /> : <Badge status="error" text="Nieopłacony"/>,
        },
    ];

    const summary = [
        {
            name: 'Bieżące opłaty',
            value: `${currency(invoice.valueNet/100)} zł`,
        },
        {
            name: 'W tym podatek',
            value: `${currency(invoice.valueVat/100)} zł`,
        },
        {
            blank: true,
        },
        {
            blank: true,
        },
        {
            name: 'Kwota rachunku',
            value: `${currency(invoice.valueGross/100)} zł`,
            render: (value) => <strong>{value}</strong>,
            renderName: (value) => <strong>{value}</strong>,
        },

    ]

    return (
        <Content style={{marginBottom: 20}}>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={4}>{moment(invoice.issuedAt).format('D MMMM YYYY')}</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button href={`/account/billing/invoice/${invoice.id.uid}/download`} icon={<DownloadOutlined />}>
                        Pobierz PDF
                    </Button>
                </Col>
            </Row>

            <Row gutter={16}>
                <Col span={24}>
                    <Title level={5} style={{padding: 3, background: '#f7f7f7', textTransform: 'uppercase'}}>Dane faktury</Title>
                </Col>
                <Col span={12}>
                    <List data={data}/>
                </Col>
                <Col span={12}>
                    <List data={summary}/>
                </Col>
            </Row>
        </Content>
    )
}

const Invoices = (props) => {
    console.log(props);

    return (
        <>
            <Tabs activeKeys={['invoices']} />
            <Last invoice={props.last} />

            <Content>
                <Title level={4}>Poprzednie faktury</Title>
                <ListView
                    columns={columns}
                    rowKey={invoice => invoice.id.uid}
                    pagination={props.pagination}
                />
            </Content>
        </>
    )
}

export default Invoices;