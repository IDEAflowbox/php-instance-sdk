import React from 'react';
import {AppContext} from "./context";
import axios from "../../../../main/axios";

export class AppProvider extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            // initialized: false
            initialized: true,
            user: {
                email: 'peter@omega323.com'
            }
        };
    }

    componentDidMount() {
        // axios
        //     .get('/api/user/overview')
        //     .then((response) => {
        //     this.setState({
        //         initialized: true,
        //         user: response.data.data.user,
        //         subscription: response.data.data.subscription,
        //     })
        // })
        // ;
    }

    render() {
        return (
            <AppContext.Provider value={this.state}>
                {this.props.children}
            </AppContext.Provider>
        )
    }
}