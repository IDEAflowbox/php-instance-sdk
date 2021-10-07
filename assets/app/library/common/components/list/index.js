import React from 'react';
import {List} from "antd";

const ExtList = (props) => (
    <List
        size={props.size}
        dataSource={props.data}
        bordered={props.bordered}
        renderItem={item => (
            <List.Item style={{justifyContent: 'normal'}}>
                <div style={{width: 300, color: '#717380', fontSize: 13}}>{item.name}</div>
                <div style={{width: 300, color: '#000', fontSize: 13}}>{item.render ? item.render(item.value) : item.value}</div>
            </List.Item>
        )}
    />
)

ExtList.defaultProps = {
    size: 'small',
    data: [],
    bordered: false
}

ExtList.Item = List.Item;

export default ExtList;