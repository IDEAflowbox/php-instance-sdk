import React from 'react';
import {Button, Col, Row, Typography} from 'antd';
import moment from "moment";
import {DownloadOutlined, PlusOutlined} from "@ant-design/icons";
import ListView from "../../../library/common/components/list-view";
import columns from "./_columns";

const {Title} = Typography;

const FramesList = (props) => {
    console.log(props);

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={2}>Ramki rekomendacji</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button href={`/frames/add/advanced`} icon={<PlusOutlined />}>
                        Dodaj
                    </Button>
                </Col>
            </Row>

            <ListView
                columns={columns}
                rowKey={frame => frame.id}
                pagination={props.pagination}
            />
        </>
    )
}

export default FramesList;