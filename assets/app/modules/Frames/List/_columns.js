import React from "react";
import currency from 'currency.js';
import {PictureOutlined} from "@ant-design/icons";
import {Button, Space} from "antd";

const columns = [
    {
        title: ' ',
        key: 'code',
        dataIndex: 'code',
        align: 'right',
        render: (code, product, index) => index+1
    },
    {
        title: 'Nazwa',
        key: 'name',
        dataIndex: 'name',
    },
    {
        title: 'Typ',
        key: 'frameType',
        dataIndex: 'frameType',
        render: (type) => type === 'advanced' ? 'Zaawansowana' : 'Prosta',
    },
    {
        title: 'Liczba wyś. produktów',
        key: 'numberOfProducts',
        dataIndex: 'numberOfProducts',
    },
]

export default columns;