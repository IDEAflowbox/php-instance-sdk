import React from 'react';
import {Select} from "antd";
import {AppContext} from "../../providers/app/context";

export default class IssuerSelect extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
            issuers: [],
        }
    }

    render() {
        return (
            <AppContext.Consumer>
                {value => {
                    return (
                        <Select {...this.props}>
                            {value.issuersAddresses.map(issuer => <Select.Option key={issuer.id} value={issuer.id}>{issuer.name}</Select.Option>)}
                        </Select>
                    )
                }}
            </AppContext.Consumer>
        );
    }
}