import React from "react";
import PropTypes from 'prop-types'; // ES6

const SegmentStatus = (props) => {
    let label = 'Przetwarzany';
    let bgColor = '#F2C94C';

    if (props.status === 'ready') {
        label = 'Gotowy';
        bgColor = '#27AE60';
    }

    return (
        <div style={{width: '130px', height: '35px', borderRadius: 20, display: 'flex', alignItems: 'center', justifyContent: 'center', background: bgColor}}>
            <span style={{color: '#fff', fontWeight: 'bold'}}>{label}</span>
        </div>
    )
}

SegmentStatus.propTypes = {
    status: PropTypes.oneOf(['ready', 'processing']),
}

export default SegmentStatus;