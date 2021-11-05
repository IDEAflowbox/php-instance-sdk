import React from "react";

const SegmentName = props => {
    return (<div style={{backgroundColor: props.color, padding: '5px 10px', borderRadius: 15}}>{props.name}</div>)
}

export default SegmentName;