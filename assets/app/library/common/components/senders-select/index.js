import React, {useEffect} from 'react';
import axios from "../../../../main/axios";
import DebounceSelect from "../debounce-select";
import {Select} from "antd";

async function fetchSenderList(name) {
    return axios
        .get('/crm/mailing/senders', {params: {name, activated: true}})
        .then(response => response.data.items.map(sender => ({
            label: sender.name,
            value: sender.id,
        })))
    ;
}

async function prefetchSenders() {
    return axios
        .get('/crm/mailing/senders', {params: {limit: 50, activated: true}})
        .then(response => response.data.items.map(sender => ({
            label: sender.name,
            value: sender.id,
        })))
}

const SendersSelect = (props) => {
    const [value, setValue] = React.useState(undefined);
    const [options, setOptions] = React.useState([]);
    const [fetched, setFetched] = React.useState(false);

    if (!fetched) {
        prefetchSenders().then(opt => {
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
            placeholder="Wybierz nadawcę"
            fetchOptions={fetchSenderList}
            defaultOptions={options}
            style={{
                width: '100%',
            }}
            {...props}
        />
    );

}
export default SendersSelect;