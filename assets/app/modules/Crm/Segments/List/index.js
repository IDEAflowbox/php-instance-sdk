import React, {useEffect, useState} from 'react';
import {Badge, Button, Col, Pagination, Row, Spin, Typography} from 'antd';
import Content from "../../../../library/common/components/content";
import SegmentStatus from "../../../../library/common/components/segment-status";
import List from "../../../../library/common/components/list";
import {useQueryParam} from "../../../../library/utilities/use-query-param";
import axios from "../../../../main/axios";
import {PlusOutlined} from "@ant-design/icons";
import {createModal} from "../../../../library/common/components/modal";
import AddSegmentModal from "./add-segment-modal";

const {Title} = Typography;

const RenderSegment = (props) => {
    const data = [
        {
            name: 'Zasięg',
            value: props.countUsers,
        },
        {
            name: 'Kolor',
            value: props.color,
            render: (color) => <Badge color={color} text={color} />,
        }
    ]
    const dataParams = [];

    props.parameters.forEach(parameter => {
        dataParams.push({
            name: parameter.type,
            value: `${parameter.operator} ${parameter.value}`
        })
    });

    return (
        <Content style={{marginBottom: 20}}>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={5}>{props.name}</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <SegmentStatus status={props.status} />
                </Col>
            </Row>
            <Row>
                <Col span={24}>
                    <List data={data}/>
                    <List data={dataParams}/>
                </Col>
            </Row>
        </Content>
    )
}

const SegmentsList = (props) => {
    const [loading, setLoading] = useState(false);
    const [page, setPage] = useState(1);
    const [data, setData] = useState(props.pagination.items);
    const [pageSize, setPageSize] = useState(props.pagination.numItemsPerPage);
    const [total, setTotal] = useState(props.pagination.totalCount);
    const [queryPage, setQueryPage, deleteQueryPage] = useQueryParam('page');

    useEffect(() => {
        const currentPage = parseInt(queryPage);
        if (currentPage && page !== currentPage) {
            setPage(parseInt(queryPage));
        }
    })

    const filterResults = () => {
        setLoading(true);

        axios
            .get(window.location.href, {headers: {accept: 'application/json'}})
            .then(response => {
                setData(response.data.items);
                setPageSize(response.data.numItemsPerPage);
                setTotal(response.data.totalCount);
                setPage(response.data.currentPageNumber);
                setLoading(false);
            })
        ;
    }

    const onChangePage = (page) => {
        setPage(page);
        setQueryPage(page);
        filterResults();
    }

    const pagination = {
        current: page,
        pageSize: pageSize,
        total: total,
        onChange: onChangePage
    };

    const handleNewSegment = () => {
        const modal = createModal({
            width: '90%',
            style: {maxWidth: 960},
            content: <AddSegmentModal close={() => modal.destroy()}/>
        });
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={2}>Segmenty</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button type="default" icon={<PlusOutlined />} onClick={handleNewSegment}>
                        Dodaj nowy segment
                    </Button>
                </Col>
            </Row>

            <Spin spinning={loading}>
                {data.map(item => <RenderSegment key={item.id} {...item}/>)}
            </Spin>
            <Pagination {...pagination} />
        </>
    )
}

export default SegmentsList;