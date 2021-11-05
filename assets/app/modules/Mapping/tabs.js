import React from 'react';
import {TagsOutlined, PartitionOutlined} from "@ant-design/icons";
import TabsSwitch from "../../library/common/components/tabs-switch";

const Tabs = (props) => (
    <TabsSwitch
        items={[
            {
                key: 'categories',
                title: 'Kategorie',
                prefix: <TagsOutlined />,
                onClick: (item, index) => window.location.href = '/mapping/categories',
                badge: props.missingCategories,
            },
            {
                key: 'features',
                title: 'Atrybuty',
                prefix: <PartitionOutlined />,
                onClick: (item, index) => window.location.href = '/mapping/features',
                badge: props.missingFeatures,
            }
        ]}
        activeKeys={props.activeKeys}
    />
)

export default Tabs;