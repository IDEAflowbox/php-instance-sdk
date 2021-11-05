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
import InvoicesInvoker from "./Invokers/Account/Billings/InvoicesInvoker";
import PaymentsInvoker from "./Invokers/Account/Billings/PaymentsInvoker";
import FeedListInvoker from "./Invokers/Feed/ListInvoker";
import ScenarioListInvoker from "./Invokers/Scenario/ListInvoker";
import MappingFeaturesInvoker from "./Invokers/Mapping/FeaturesInvoker";
import MappingCategoriesInvoker from "./Invokers/Mapping/CategoriesInvoker";
import FramesListInvoker from "./Invokers/Frames/FramesListInvoker";
import FramesAddAdvancedInvoker from "./Invokers/Frames/Add/AdvancedInvoker";
import CrmUsersListInvoker from "./Invokers/Crm/Users/ListInvoker";
import CrmUsersDetailsInvoker from "./Invokers/Crm/Users/DetailsInvoker";
import CrmSegmentsListInvoker from "./Invokers/Crm/Segments/ListInvoker";
import CrmMailingMailingListInvoker from "./Invokers/Crm/Mailing/Mailing/ListInvoker";
import CrmMailingMailingAddInvoker from "./Invokers/Crm/Mailing/Mailing/AddInvoker";
import CrmMailingSendersListInvoker from "./Invokers/Crm/Mailing/Senders/ListInvoker";

import '../app/library/common/components/layout/sider-menu/index.scss';
import '../app/library/common/components/layout/impersonation/index.scss';
import '../app/library/common/components/layout/header/index.scss';
import '../app/library/common/components/not-auth-layout/index.scss';
import '../app/main/antd-config.css';
import '../app/main/App.scss';
import "ace-builds/src-noconflict/mode-html";
import "ace-builds/src-noconflict/theme-github";


ReactOnRails.register({
    Menu: MenuInvoker,
    Header: HeaderInvoker,
    Login: LoginInvoker,
    ClientList: ClientListInvoker,
    ClientDetails: ClientDetailsInvoker,

    Account_Settings_BillingDetails: BillingDetailsInvoker,
    Account_Settings_AccountDetails: AccountDetailsInvoker,
    Account_Settings_ChangePassword: ChangePasswordInvoker,

    Account_Billings_Invoices: InvoicesInvoker,
    Account_Billings_Payments: PaymentsInvoker,

    Feed_List: FeedListInvoker,
    Scenario_List: ScenarioListInvoker,

    Mapping_Categories: MappingCategoriesInvoker,
    Mapping_Features: MappingFeaturesInvoker,

    Frames_List: FramesListInvoker,
    Frames_Add_Advanced: FramesAddAdvancedInvoker,

    Crm_Users_List: CrmUsersListInvoker,
    Crm_Users_Details: CrmUsersDetailsInvoker,
    Crm_Segments_List: CrmSegmentsListInvoker,

    Crm_Mailing_Mailing_List: CrmMailingMailingListInvoker,
    Crm_Mailing_Mailing_Add: CrmMailingMailingAddInvoker,
    Crm_Mailing_Senders_List: CrmMailingSendersListInvoker,
});