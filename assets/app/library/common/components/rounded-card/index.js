import React from 'react';
import {Card} from 'antd';

const RoundedCard = (props) => {
    return (
        <Card style={{borderRadius: 4, boxShadow: "rgba(0, 0, 0, 0.1) 0px 4px 12px"}} {...props}>
            {props.children}
        </Card>
    )
}

export default RoundedCard;