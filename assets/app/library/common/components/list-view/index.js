import React, {useEffect, useState} from 'react';
import {Table} from "antd";
import axios from "../../../../main/axios";
import {usePrevious} from "../../../utilities/use-previous";
import {useQueryParam} from "../../../utilities/use-query-param";
let throttleId;

const ListView = (props) => {
    const [loading, setLoading] = useState(false);
    const [page, setPage] = useState(1);
    const [data, setData] = useState(props.pagination.items);
    const [pageSize, setPageSize] = useState(props.pagination.numItemsPerPage);
    const [total, setTotal] = useState(props.pagination.totalCount);
    const [queryPage, setQueryPage, deleteQueryPage] = useQueryParam('page');
    const [querySearch, setQuerySearch] = useQueryParam('search');

    const prevSearchValue = usePrevious(props.searchValue);

    useEffect(() => {
        const currentPage = parseInt(queryPage);
        if (currentPage && page !== currentPage) {
            setPage(parseInt(queryPage));
        }

        if (prevSearchValue !== props.searchValue) {
            handleSearch(props.searchValue);
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

    const handleSearch = (value) => {
        clearTimeout(throttleId);
        throttleId = setTimeout(() => {
            setPage(1);
            deleteQueryPage();
            setQuerySearch(value);

            filterResults();
        }, props.throttleTime);
    }

    const pagination = {
        current: page,
        pageSize: pageSize,
        total: total,
        onChange: onChangePage
    };

    return <Table
        columns={props.columns}
        dataSource={data}
        rowKey={props.rowKey}
        size={props.size}
        pagination={pagination}
        loading={loading}
    />
}

ListView.defaultProps = {
    size: "small",
    searchValue: "",
    throttleTime: 500
};

export default ListView;