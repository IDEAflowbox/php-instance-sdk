import React from 'react';

export const AppContext = React.createContext({
    issuers_addresses: [],
    user: {
        username: null
    },
});