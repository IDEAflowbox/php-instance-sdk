import React from "react";
import moment from 'moment';
import currency from 'currency.js';
import {Button} from "antd";
import {DownloadOutlined} from "@ant-design/icons";

const columns = [
    {
        title: 'Numer faktury',
        key: 'number',
        dataIndex: 'number'
    },
    {
        title: 'Data wystawienia',
        key: 'issuedAt',
        dataIndex: 'issuedAt',
        render: (_, invoice) => moment(invoice.issuedAt).format('DD-MM-YYYY'),
    },
    {
        title: 'Kwota',
        key: 'valueGross',
        dataIndex: 'valueGross',
        render: (_, payment) => `${currency(payment.valueGross/100)} zł`,
    },
    {
        title: 'Termin płatności',
        key: 'dueDate',
        dataIndex: 'dueDate',
        render: (_, invoice) => moment(invoice.dueDate).format('DD-MM-YYYY'),
    },
    {
        title: 'Dokumenty',
        key: 'documents',
        dataIndex: 'documents',
        align: 'right',
        render: (_, invoice) => (
            <Button href={`/account/billing/invoice/${invoice.id.uid}/download`} icon={<DownloadOutlined />}>
                Pobierz PDF
            </Button>
        )
    },
]

export default columns;