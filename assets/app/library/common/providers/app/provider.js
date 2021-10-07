import React from 'react';
import {AppContext} from "./context";

export class AppProvider extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            issuers_addresses: [],
            user: {
                username: 'peter@omega323.com'
            }
        };
    }

    render() {
        return (
            <AppContext.Provider value={this.state}>
                {this.props.children}
            </AppContext.Provider>
        )
    }
}