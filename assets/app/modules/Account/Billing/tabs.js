import React from 'react';
import {CopyOutlined, CreditCardOutlined} from "@ant-design/icons";
import TabsSwitch from "../../../library/common/components/tabs-switch";

const Tabs = (props) => (
    <TabsSwitch
        items={[
            {
                key: 'invoices',
                title: 'Faktury',
                prefix: <CopyOutlined />,
                onClick: (item, index) => window.location.href = '/account/billing/invoices',
            },
            {
                key: 'payments',
                title: 'Płatności',
                prefix: <CreditCardOutlined />,
                onClick: (item, index) => window.location.href = '/account/billing/payments',
            }
        ]}
        activeKeys={props.activeKeys}
    />
)

export default Tabs;