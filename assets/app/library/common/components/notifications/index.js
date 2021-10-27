import React from 'react';
import {notification} from 'antd';

const notifications = {
    success: (message) => {
        notification.info({
            message: `Zwycięstwo!`,
            description: message,
            placement: 'topRight',
        });

    },
    error: (message) => {
        notification.error({
            message: `Wystąpił błąd!`,
            description: message,
            placement: 'topRight',
        });

    }
}

export default notifications;