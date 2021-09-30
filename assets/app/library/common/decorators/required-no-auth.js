import React from 'react';
import {AuthContext} from "../providers/auth/context";
import {Redirect} from "react-router";

const requiredNoAuth = (Component) => {
    return (props) => (
        <AuthContext.Consumer>
            {(authState) => {
                if (authState.initialized) {
                    if (!authState.logged_in) {
                        return <Component {...props}/>;
                    } else {
                        return <Redirect to="/"/>
                    }
                }

                return null;
            }}
        </AuthContext.Consumer>
    );
}

export default requiredNoAuth;
