import React from "react";
import moment from 'moment';
import currency from 'currency.js';

const columns = [
    {
        title: 'Data',
        key: 'date',
        dataIndex: 'date',
        render: (_, payment) => moment(payment.createdAt).format('DD-MM-YYYY'),
    },
    {
        title: 'Opis',
        key: 'description',
        dataIndex: 'description'
    },
    {
        title: 'Kwota',
        key: 'value',
        dataIndex: 'value',
        render: (_, payment) => `${currency(payment.value/100)} zł`,
    },
]

export default columns;