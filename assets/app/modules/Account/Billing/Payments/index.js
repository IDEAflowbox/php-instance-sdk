import React from 'react';
import Tabs from "../tabs";
import ListView from "../../../../library/common/components/list-view";
import columns from './_columns';
import Content from "../../../../library/common/components/content";

const Payments = (props) => {

    return (
        <>
            <Tabs activeKeys={['payments']} />

            <Content>
                <ListView
                    columns={columns}
                    rowKey={payment => payment.id.uid}
                    pagination={props.pagination}
                />
            </Content>
        </>
    )
}

export default Payments;