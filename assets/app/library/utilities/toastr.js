import {notification} from "antd";
const defaultDuration = 4.5;

const showNotification = (
    type,
    message,
    description,
    duration = defaultDuration
) => {
    notification[type]({
        message,
        description,
        duration
    });
};

const toastr = {
    success: (message, description, duration = defaultDuration) =>
        showNotification('success', message, description, duration),
    info: (message, description, duration = defaultDuration) =>
        showNotification('info', message, description, duration),
    error: (message, description, duration = defaultDuration) =>
        showNotification('error', message, description, duration),
    warning: (message, description, duration = defaultDuration) =>
        showNotification('warning', message, description, duration),
}

export default toastr;