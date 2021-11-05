import React, {useEffect, useState} from 'react';
import {Button, Col, Pagination, Row, Spin, Typography} from 'antd';
import Content from "../../../library/common/components/content";
import List from "../../../library/common/components/list";
import {PlusOutlined} from "@ant-design/icons";
import {useQueryParam} from "../../../library/utilities/use-query-param";
import axios from "../../../main/axios";
import {createModal} from "../../../library/common/components/modal";
import AddScenarioModal from "./add-scenario-modal";
import {ScenarioFieldTypesTranslations} from "../../../library/common/components/scenario-field-type-selector";

const {Title} = Typography;

const RenderScenario = (props) => {
    const dataParams = [];
    props.criteria.filters.forEach(parameter => {
        dataParams.push({
            name: ScenarioFieldTypesTranslations[parameter.field],
            value: `${parameter.operator} ${parameter.value}`
        })
    });

    return (
        <Content style={{marginBottom: 20}}>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={5}>{props.name}</Title>
                </Col>
            </Row>
            <Row>
                <Col span={24}>
                    <List data={dataParams}/>
                </Col>
            </Row>
        </Content>
    )
}

const ScenarioList = (props) => {
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

    const handleNewScenario = () => {
        const modal = createModal({
            width: '90%',
            style: {maxWidth: 960},
            content: <AddScenarioModal close={() => modal.destroy()}/>
        });
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={2}>Scenariusze</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Button type="default" icon={<PlusOutlined />} onClick={handleNewScenario}>
                        Dodaj nowy scenariusz
                    </Button>
                </Col>
            </Row>

            <Spin spinning={loading}>
                {data.map(item => <RenderScenario key={item.id} {...item}/>)}
            </Spin>
            <Pagination {...pagination} />
        </>
    )
}

export default ScenarioList;