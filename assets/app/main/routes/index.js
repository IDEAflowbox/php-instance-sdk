import React from "react";
import {
    BrowserRouter,
    Switch,
    Route
} from "react-router-dom";

import Login from '../../modules/Authorization/Login';
import Logout from '../../modules/Authorization/Logout';
import Home from '../../modules/Home';

export const Routes = () => (
    <BrowserRouter>
        <Switch>
            <Route path="/login" exact={true} component={Login}/>
            <Route path="/logout" exact={true} component={Logout}/>
            <Route path="/playground" exact={true} component={Home}/>
        </Switch>
    </BrowserRouter>
)