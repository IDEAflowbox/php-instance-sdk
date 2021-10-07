import React from 'react';
import ReactOnRails from "react-on-rails";
import MenuInvoker from "./Invokers/MenuInvoker";
import HeaderInvoker from "./Invokers/HeaderInvoker";
import LoginInvoker from "./Invokers/LoginInvoker";
import ClientListInvoker from "./Invokers/ClientListInvoker";
import ClientDetailsInvoker from "./Invokers/ClientDetailsInvoker";
import BillingDetailsInvoker from "./Invokers/Account/Settings/BillingDetailsInvoker";
import AccountDetailsInvoker from "./Invokers/Account/Settings/AccountDetailsInvoker";
import ChangePasswordInvoker from "./Invokers/Account/Settings/ChangePasswordInvoker";

import '../app/library/common/components/layout/sider-menu/index.scss';
import '../app/library/common/components/layout/impersonation/index.scss';
import '../app/library/common/components/layout/header/index.scss';
import '../app/library/common/components/not-auth-layout/index.scss';
import '../app/main/antd-config.css';
import '../app/main/App.scss';

ReactOnRails.register({
    Menu: MenuInvoker,
    Header: HeaderInvoker,
    Login: LoginInvoker,
    ClientList: ClientListInvoker,
    ClientDetails: ClientDetailsInvoker,

    Account_Settings_BillingDetails: BillingDetailsInvoker,
    Account_Settings_AccountDetails: AccountDetailsInvoker,
    Account_Settings_ChangePassword: ChangePasswordInvoker,
});