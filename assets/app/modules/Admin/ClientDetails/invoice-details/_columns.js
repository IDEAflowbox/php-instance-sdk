import {Button, Form, Input, InputNumber, Popconfirm} from "antd";
import {DeleteOutlined} from "@ant-design/icons";
import React from "react";

function columns(editing, handleDelete) {
    return [
        {
            title: ' ',
            key: 'key',
            align: 'right',
            render: (name, item, index) => index+1
        },
        {
            title: 'Nazwa',
            dataIndex: 'name',
            key: 'name',
            render: (name, item, index) => {
                if (editing) {
                    return (
                        <Form.Item name={['item', item.id.uid, 'name']} initialValue={name} noStyle={true}>
                            <Input />
                        </Form.Item>
                    )
                }

                return name;
            },
        },
        {
            title: 'Ilość',
            dataIndex: 'quantity',
            key: 'quantity',
            render: (quantity, item, index) => {
                if (editing) {
                    return (
                        <Form.Item name={['item', item.id.uid, 'quantity']} initialValue={quantity} noStyle={true}>
                            <InputNumber min={0}/>
                        </Form.Item>
                    )
                }

                return quantity;
            },
        },
        {
            title: 'Cena jedn. netto',
            dataIndex: 'unit_price',
            key: 'unitPrice',
            render: (unitPrice, item, index) => {
                if (editing) {
                    return (
                        <Form.Item name={['item', item.id.uid, 'unit_price']} initialValue={unitPrice} noStyle={true}>
                            <InputNumber min={0} formatter={value => `${value} zł`} parser={value => value.replace(/\$\s?|(,*)/g, '')} />
                        </Form.Item>
                    )
                }

                return `${unitPrice} zł`;
            },
        },
        {
            title: 'VAT',
            dataIndex: 'vat_rate',
            key: 'vatRate',
            render: (vatRate, item, index) => {
                if (editing) {
                    return (
                        <Form.Item name={['item', item.id.uid, 'vat_rate']} initialValue={vatRate} noStyle={true}>
                            <InputNumber min={0} max={100} formatter={value => `${value}%`} parser={value => value.replace('%', '')} />
                        </Form.Item>
                    )
                }

                return `${vatRate}%`;
            },
        },
        {
            title: ' ',
            key: 'actions',
            align: 'right',
            render: (_, item, index) => editing ? (
                <Popconfirm title="Na pewno chcesz usunąć pozycję?" okText="Tak" cancelText="Anuluj" onConfirm={() => handleDelete(index)}>
                    <Button type="danger">
                        <DeleteOutlined/>
                    </Button>
                </Popconfirm>
            ) : null,
        }
    ];
}

export default columns;