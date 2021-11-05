import React from 'react';
import {Select} from "antd";

export const ScenarioFieldTypes = ["code", "name", "description", "net_price", "gross_price"];
export const ScenarioFieldTypesTranslations = {
    code: 'Kod produktu',
    name: 'Nazwa produktu',
    description: 'Opis',
    net_price: 'Cena netto',
    gross_price: 'Cena brutto',
};

const ScenarioFieldTypeSelector = (props) => {
    return (
        <Select {...props}>
            {ScenarioFieldTypes.map(type => <Select.Option key={type} value={type}>{ScenarioFieldTypesTranslations[type]}</Select.Option>)}
        </Select>
    )
}

export default ScenarioFieldTypeSelector;