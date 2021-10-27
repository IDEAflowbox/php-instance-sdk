import React from 'react';
import {List} from "antd";

const ExtList = (props) => (
    <List
        size={props.size}
        dataSource={props.data}
        bordered={props.bordered}
        renderItem={item => {
            if (item.blank) {
                return (
                    <List.Item style={{justifyContent: 'normal', fontSize: 13}}>
                        &nbsp;
                    </List.Item>
                )
            }

            return (
                <List.Item style={{justifyContent: 'normal', fontSize: 13}}>
                    <div style={{width: 300, color: '#717380'}}>{item.renderName ? item.renderName(item.name) : item.name}</div>
                    <div style={{width: 300, color: '#000'}}>{item.render ? item.render(item.value) : item.value}</div>
                </List.Item>
            )
        }}
    />
)

ExtList.defaultProps = {
    size: 'small',
    data: [],
    bordered: false
}

ExtList.Item = List.Item;

export default ExtList;