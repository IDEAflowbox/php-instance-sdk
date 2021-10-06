import {Button} from "antd";
import React from "react";

const columns = [
    {
        title: 'Imię i nazwisko',
        key: 'name',
        render: (_, client) => `${client.billing_address.first_name} ${client.billing_address.last_name}`
    },
    {
        title: 'E-mail',
        key: 'email',
        render: (_, client) => client.billing_address.email,
    },
    {
        title: 'Firma',
        key: 'company',
        render: (_, client) => client.billing_address.company_name,
    },
    {
        title: 'Miasto',
        key: 'city',
        render: (_, client) => client.billing_address.city,
    },
    {
        title: 'Kod pocztowy',
        key: 'zip_code',
        render: (_, client) => client.billing_address.zip_code,
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