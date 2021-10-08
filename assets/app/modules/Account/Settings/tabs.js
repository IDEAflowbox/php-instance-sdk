import React from 'react';
import {CreditCardOutlined, UserOutlined} from "@ant-design/icons";
import TabsSwitch from "../../../library/common/components/tabs-switch";

const Tabs = (props) => (
    <TabsSwitch
        items={[
            {
                key: 'account',
                title: 'Dane konta',
                prefix: <UserOutlined />,
                onClick: (item, index) => window.location.href = '/account/settings/account',
            },
            {
                key: 'billing',
                title: 'Dane rozliczeniowe',
                prefix: <CreditCardOutlined />,
                onClick: (item, index) => window.location.href = '/account/settings/billing',
            }
        ]}
        activeKeys={props.activeKeys}
    />
)

export default Tabs;