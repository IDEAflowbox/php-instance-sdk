import React from 'react';
import {AuthContext} from "./context";
import axios from "../../../../main/axios";

export class AuthProvider extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            // access_token: undefined,
            access_token: {
                refresh_token: "sss",
                access_token: "sss",
                token_type: "refresh",
                expires_in: 9999999
            },
            logged_in: true,
            login: this.login.bind(this),
            logout: this.logout.bind(this),
            initialized: false
        };
    }

    logout() {
        return new Promise((resolve) => {
            localStorage.removeItem('access_token');
            resolve(true);
        });
    }

    login(email, password) {
        return new Promise((resolve, reject) => {
            axios
                .post('/oauth/v2/token', {
                    'client_id': process.env.REACT_APP_API_CLIENT_ID,
                    'client_secret': process.env.REACT_APP_API_SECRET,
                    'grant_type': 'password',
                    'username': email,
                    'password': password
                })
                .then((response) => {
                    this.setState({
                        access_token: response.data,
                        logged_in: true,
                        error: undefined
                    }, () => {
                        localStorage.setItem('access_token', JSON.stringify(response.data));
                        resolve(true);
                    });
                })
                .catch((error) => {
                    this.setState({
                        access_token: undefined,
                        logged_in: false,
                        error: error.response?.data.error_description
                    }, () => reject(error.response?.data.error_description));
                })
            ;
        });
    }

    componentDidMount() {
        const token = localStorage.getItem('access_token');

        if (token) {
            this.setState({
                access_token: JSON.parse(token),
                logged_in: true,
                initialized: true
            });
        } else {
            this.setState({
                initialized: true
            });
        }
    }

    render() {
        return (
            <AuthContext.Provider value={this.state}>
                {this.props.children}
            </AuthContext.Provider>
        )
    }
}