import React from 'react';
import columns from "./_columns";
import {Typography} from 'antd';
import ListView from "../../../../library/common/components/list-view";

const {Title} = Typography;

const UsersList = (props) => {
    console.log(props);

    return (
        <>
            <Title level={2}>Użytkownicy</Title>

            <ListView
                columns={columns}
                rowKey={user => user.id}
                pagination={props.pagination}
            />
        </>
    )
}

export default UsersList;