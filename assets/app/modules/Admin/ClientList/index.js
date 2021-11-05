import React, {useState} from 'react';
import {Button, Col, Input, Row, Space, Table, Typography} from "antd";
import columns from './_columns';
import {SearchOutlined, PlusOutlined} from "@ant-design/icons";
import ListView from '../../../library/common/components/list-view';
import {useQueryParam} from "../../../library/utilities/use-query-param";
import {createModal} from "../../../library/common/components/modal";
import AddClientModal from "./add-client-modal";
import {AppContext} from "../../../library/common/providers/app/context";
const {Title} = Typography;

const ClientList = (props) => {
    const [searchValue, setSearchValue] = useState(null);
    const [search] = useQueryParam('search');

    const handleChangeText = (e) => {
        setSearchValue(e.target.value)
    }

    const handleNewClient = () => {
        const modal = createModal({
            width: '90%',
            style: {maxWidth: 960},
            content: <AppContext.Provider value={props['_globals']}><AddClientModal close={() => modal.destroy()}/></AppContext.Provider>,
        });
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={4}>Lista klientów</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Space>
                        <Input placeholder="Szukaj" prefix={<SearchOutlined />} onChange={handleChangeText} defaultValue={search}/>

                        <Button type="default" icon={<PlusOutlined />} onClick={handleNewClient}>
                            Dodaj nowego klienta
                        </Button>
                    </Space>
                </Col>
            </Row>
            <Row>
                <Col span={24}>
                    <ListView
                        columns={columns}
                        rowKey={client => client.id.uid}
                        pagination={props.pagination}
                        searchValue={searchValue}
                    />
                </Col>
            </Row>
        </>
    )
}

export default ClientList;