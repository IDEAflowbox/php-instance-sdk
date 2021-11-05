import React from 'react';
import {Provider as ReduxProvider} from "react-redux";
import {Routes} from "./routes";
import {store} from "./store/configureStore";
import {AuthProvider} from "../library/common/providers/auth/provider";
import {AppProvider} from "../library/common/providers/app/provider";
import './antd-config.css';
import './App.scss';

const App = () => {
    return (
        <ReduxProvider store={store}>
            <AuthProvider>
                <AppProvider>
                    <Routes/>
                </AppProvider>
            </AuthProvider>
        </ReduxProvider>
    )
}

export default App;