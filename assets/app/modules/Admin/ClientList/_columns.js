import {Button} from "antd";
import React from "react";

const columns = [
    {
        title: 'Imię i nazwisko',
        key: 'name',
        render: (_, client) => `${client.billingAddress.firstName} ${client.billingAddress.lastName}`
    },
    {
        title: 'E-mail',
        key: 'email',
        render: (_, client) => client.billingAddress.email,
    },
    {
        title: 'Firma',
        key: 'company',
        render: (_, client) => client.billingAddress.companyName,
    },
    {
        title: 'Miasto',
        key: 'city',
        render: (_, client) => client.billingAddress.city,
    },
    {
        title: 'Kod pocztowy',
        key: 'zipCode',
        render: (_, client) => client.billingAddress.zipCode,
    },
    {
        title: ' ',
        key: 'action',
        align: 'right',
        render: (_, client) => {
            return (
                <Button href={`/admin/client/${client.id.uid}/show`}>
                    Szczegóły
                </Button>
            )
        }
    }
]

export default columns;