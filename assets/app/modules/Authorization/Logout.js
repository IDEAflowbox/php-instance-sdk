import React from 'react';
import './styles.scss';
import {AuthContext} from "../../library/common/providers/auth/context";
import requiredAuth from "../../library/common/decorators/required-auth";

const Logout = (props) => {
    return (
        <AuthContext.Consumer>
            {(authState) => {
                setTimeout(() => {
                    authState
                        .logout()
                        .then(() => {
                            window.location.href = '/login';
                        });
                }, 2000)

                return (
                    <div>
                        Logging out...
                    </div>
                )
            }}
        </AuthContext.Consumer>
    )
}

export default requiredAuth(Logout);