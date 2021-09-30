import React from 'react';
import '../app/library/common/components/layout/sider-menu/index.scss';
import '../app/library/common/components/layout/header/index.scss';
import '../app/main/antd-config.css';
import '../app/main/App.scss';
import ReactOnRails from "react-on-rails";
import MenuInvoker from "./Invokers/MenuInvoker";
import HeaderInvoker from "./Invokers/HeaderInvoker";

ReactOnRails.register({
    Menu: MenuInvoker,
    Header: HeaderInvoker
});