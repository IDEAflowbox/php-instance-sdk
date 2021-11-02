import React from 'react';
import {Button, Col, Row, Typography} from 'antd';
import columns from "./_columns";
import ListView from "../../../../../library/common/components/list-view";
import {PlusOutlined} from "@ant-design/icons";
import {createModal} from "../../../../../library/common/components/modal";
import AddSenderModal from "./add-sender-modal";

const {Title} = Typography;

const handleAddSenderModal = (senderId) => {
    const modal = createModal({
        width: '90%',
        style: {maxWidth: 600},
        content: <AddSenderModal close={() => modal.destroy()} />
    });
}

const SendersList = (props) => {
    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={2}>Nadawcy</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button type="default" icon={<PlusOutlined />} onClick={handleAddSenderModal}>
                        Dodaj nadawcę
                    </Button>
                </Col>
            </Row>

            <Row>
                <Col span={24}>
                    <ListView
                        columns={columns}
                        rowKey={sender => sender.id}
                        pagination={props.pagination}
                    />
                </Col>
            </Row>
        </>
    )
}

export default SendersList;