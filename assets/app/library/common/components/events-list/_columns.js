import React from "react";
import {EventTranslations} from "./index";

const columns = [
    {
        title: 'Id',
        key: 'id',
        dataIndex: 'id',
    },
    {
        title: 'Event',
        key: 'eventType',
        dataIndex: 'eventType',
        render: (type) => EventTranslations[type]
    },
    {
        title: 'Produkt',
        key: 'productId',
        dataIndex: 'productId',
        // render: (_, user) => `${user.firstName} ${user.lastName}`
    },
]

export default columns;