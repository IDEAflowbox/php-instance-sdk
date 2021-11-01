import React from 'react';
import {Select} from "antd";

export const SegmentParameterTypes = ["FIRST_NAME", "LAST_NAME", "CITY", "POSTCODE", "COUNTRY", "ORDER_PLACED"];
export const SegmentParameterTypesTranslations = {
    FIRST_NAME: 'Imię',
    LAST_NAME: 'Nazwisko',
    CITY: 'Miasto',
    POSTCODE: 'Kod pocztowy',
    COUNTRY: 'Kraj',
    ORDER_PLACED: 'Złożył zamówienie',
};

const SegmentParameterTypeSelector = (props) => {
    return (
        <Select {...props}>
            {SegmentParameterTypes.map(type => <Select.Option key={type} value={type}>{SegmentParameterTypesTranslations[type]}</Select.Option>)}
        </Select>
    )
}

export default SegmentParameterTypeSelector;