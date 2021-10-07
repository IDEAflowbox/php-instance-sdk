import React from 'react';
import {Modal} from "antd";
import './index.scss'

export const createModal = (props) => {
    return Modal.confirm({
        ...props,
        icon: null,
        okButtonProps: {
            hidden: true
        },
        cancelButtonProps: {
            hidden: true
        }
    })
}