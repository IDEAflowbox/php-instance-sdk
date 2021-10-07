import React from 'react';

export const AppContext = React.createContext({
    issuersAddresses: [],
    user: {
        username: null
    },
});