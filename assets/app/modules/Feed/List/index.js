import React from 'react';
import {Typography} from 'antd';
import columns from "./_columns";
import ListView from "../../../library/common/components/list-view";

const {Title} = Typography;

const FeedList = (props) => {
    return (
        <>
            <Title level={2}>Feed produktowy</Title>

            <ListView
                columns={columns}
                rowKey={product => product.id}
                pagination={props.pagination}
            />
        </>
    )
}

export default FeedList;