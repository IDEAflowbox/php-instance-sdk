import React from "react";
import PropTypes from 'prop-types';
import {Badge} from "antd";

const MailingStatus = (props) => {
    let label = {
        ready_to_send: 'Zaplanowano',
        processing: 'W trakcie wysyłki',
        finished: 'Zakończono',
        paused: 'Zatrzymano',
        cancelled: 'Anulowano',
    };
    let color = {
        ready_to_send: '#2F80ED',
        processing: '#2F80ED',
        finished: '#219653',
        paused: '#F2994A',
        cancelled: '#EB5757',
        error: '#EB5757',
    };

    return <Badge color={color[props.status]} text={label[props.status]}/>
}

MailingStatus.propTypes = {
    status: PropTypes.oneOf(['ready_to_send', 'processing', 'finished', 'paused', 'cancelled', 'error'])
}

export default MailingStatus;