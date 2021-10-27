import React from 'react';
import {Select} from "antd";
import Features from "./_features";

const PredefinedFeaturesSelect = (props) => {
    return (
        <Select {...props} allowClear={true}>
            {Features.map((feature) => (
                <Select.OptGroup key={feature.id} label={feature.name}>
                    {feature.choices.map(choice => <Select.Option key={`${feature.id}-${choice.id}`} value={choice.id}>{choice.name}</Select.Option>)}
                </Select.OptGroup>
            ))}
        </Select>
    )
}
export default PredefinedFeaturesSelect;