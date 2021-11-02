import React from 'react';
import axios from "../../../../main/axios";
import DebounceSelect from "../debounce-select";
import {Select} from "antd";

async function fetchSegmentList(name) {
    return axios
        .get('/crm/segments', {params: {name}})
        .then(response => response.data.items.map(sender => ({
            label: sender.name,
            value: sender.id,
        })))
        ;
}

async function prefetchSegments() {
    return axios
        .get('/crm/segments', {params: {limit: 50}})
        .then(response => response.data.items.map(sender => ({
            label: sender.name,
            value: sender.id,
        })))
}

const SegmentsSelect = (props) => {
    const [value, setValue] = React.useState(undefined);
    const [options, setOptions] = React.useState([]);
    const [fetched, setFetched] = React.useState(false);

    if (!fetched) {
        prefetchSegments().then(opt => {
            setOptions(opt);
            setFetched(true);
        })
    }

    if (!fetched) {
        return <Select placeholder="Wczytywanie..." {...props}/>;
    }

    return (
        <DebounceSelect
            value={value}
            placeholder="Wybierz segment"
            fetchOptions={fetchSegmentList}
            defaultOptions={options}
            style={{
                width: '100%',
            }}
            {...props}
        />
    );

}
export default SegmentsSelect;