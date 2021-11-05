import React, {useState} from 'react';
import {Button, Col, Input, Row, Space, Typography} from 'antd';
import columns from "./_columns";
import ListView from "../../../../../library/common/components/list-view";
import {PlusOutlined, SearchOutlined} from "@ant-design/icons";
import {useQueryParam} from "../../../../../library/utilities/use-query-param";

const {Title} = Typography;

const MailingList = (props) => {
    const [searchValue, setSearchValue] = useState(null);
    const [search] = useQueryParam('search');

    const handleChangeText = (e) => {
        setSearchValue(e.target.value)
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={2}>Mailing</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Space>
                        <Input placeholder="Szukaj" prefix={<SearchOutlined />} onChange={handleChangeText} defaultValue={search}/>

                        <Button type="default" icon={<PlusOutlined />} href="/crm/mailing/add">
                            Dodaj
                        </Button>
                    </Space>
                </Col>
            </Row>

            <ListView
                columns={columns}
                rowKey={mailing => mailing.id}
                pagination={props.pagination}
                searchValue={searchValue}
            />
        </>
    )
}

export default MailingList;