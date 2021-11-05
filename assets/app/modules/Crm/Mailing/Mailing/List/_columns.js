import React from "react";
import moment from "moment";
import MailingStatus from "../../../../../library/common/components/mailing-status";
import {Button, Dropdown, Menu} from "antd";
import {MoreOutlined} from "@ant-design/icons";

const columns = [
    {
        title: 'Nazwa',
        key: 'name',
        dataIndex: 'name',
    },{
        title: 'Tytuł',
        key: 'title',
        dataIndex: 'title',
    },
    {
        title: 'Wysyłka',
        key: 'start_date',
        dataIndex: 'start_date',
        render: (_, mailing) => moment(mailing.startDate).format('DD-MM-YYYY HH:mm'),
    },
    {
        title: 'Zasięg',
        key: 'reach',
        dataIndex: 'reach',
        render: (_, mailing) => `${mailing.outbound}/${mailing.reach}`,
    },
    {
        title: 'Status',
        key: 'status',
        dataIndex: 'status',
        render: status => <MailingStatus status={status} />,
    },
    {
        title: ' ',
        key: 'action',
        align: 'right',
        render: _ => {
            const menu = (
                <Menu>
                    <Menu.Item key="export">
                        <a>Export</a>
                    </Menu.Item>

                    <Menu.Item key="cancel">
                        <a>Anuluj</a>
                    </Menu.Item>
                </Menu>
            )
            return (
                <Dropdown overlay={menu}>
                    <Button><MoreOutlined /></Button>
                </Dropdown>
            )
        },
    }
]

export default columns;