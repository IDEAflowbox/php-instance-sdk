import React from 'react';
import {Select} from "antd";

export const SegmentParameterOperators = ["<", ">", "<=", ">=", "=", "<>", "!=", "like"];

const SegmentParameterOperatorSelector = (props) => {
    return (
        <Select {...props}>
            {SegmentParameterOperators.map(operator => <Select.Option key={operator} value={operator}>{operator}</Select.Option>)}
        </Select>
    )
}

export default SegmentParameterOperatorSelector;