import React from "react";
import currency from 'currency.js';
import {PictureOutlined} from "@ant-design/icons";
import {Button, Space} from "antd";

const columns = [
    {
        title: 'Imię i nazwisko',
        key: 'name',
        render: (_, user) => `${user.firstName} ${user.lastName}`
    },
    {
        title: 'E-mail',
        key: 'email',
        dataIndex: 'email',
    },
    {
        title: 'Login',
        key: 'username',
        dataIndex: 'username'
    },
    {
        title: 'Płeć',
        key: 'sex',
        render: (_, user) => user.sex ? (user.sex === 'male' ? 'mężczyzna' : 'kobieta') : '-',
    },
    {
        title: 'Numer telefonu',
        key: 'phoneNumber',
        dataIndex: 'phoneNumber'
    },
    {
        title: 'Adres',
        key: 'address',
        render: (_, user) => `${user.postcode} ${user.city}, ${user.country}`
    }
]

export default columns;