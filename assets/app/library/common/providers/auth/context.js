import React from 'react';

export const AuthContext = React.createContext({
    logged_in: false,
    access_token: undefined,
    login: (email, password) => new Promise((resolve, reject) => {}),
    logout: () => new Promise(resolve => {}),
    error: undefined,
    initialized: false
});