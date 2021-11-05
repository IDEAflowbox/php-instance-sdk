import React from 'react';
import {Select} from "antd";
import Categories from "./_categories";

const PredefinedCategoriesSelect = (props) => {
    return (
        <Select {...props} allowClear={true}>
            {Categories.map(category => <Select.Option key={category.id} value={category.id}>{category.name}</Select.Option>)}
        </Select>
    )
}
export default PredefinedCategoriesSelect;