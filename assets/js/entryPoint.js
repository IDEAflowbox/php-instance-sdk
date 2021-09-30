import React, {useState} from 'react';
import ReactOnRails from "react-on-rails";

import Layout from '../app/library/common/components/layout';

const Entry = (props) => {
    return (
        <div id="root"/>
    )
}

console.log('entry point');

ReactOnRails.register({
    EntryApp: Entry,
    Layout
});