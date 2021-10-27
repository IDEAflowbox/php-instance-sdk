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
        render: (name, product) => (
            <Space>
                {product.image ? (
                    <a href={product.image} style={{verticalAlign: 'middle'}} target="_blank" rel="nofollow">
                        <PictureOutlined />
                    </a>
                ) : null}
                <a href={product.url} style={{fontWeight: 'inherit'}} target="_blank" rel="nofollow">
                    {name}
                </a>
            </Space>
        )
    },
    {
        title: 'Kod produktu',
        key: 'code',
        dataIndex: 'code',
    },
    {
        title: 'Cena netto',
        key: 'netPrice',
        dataIndex: 'netPrice',
        render: (price) => `${currency(price)} zł`
    },
    {
        title: 'Cena brutto',
        key: 'grossPrice',
        dataIndex: 'grossPrice',
        render: (price) => `${currency(price)} zł`
    },
]

export default columns;