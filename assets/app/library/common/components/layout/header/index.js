import {Avatar, Dropdown, Space, Spin, Layout, Menu} from "antd";
import React from "react";
import LanguageSelector from "../../language-selector";
import logo from "../../../../../resources/images/logo-black.svg";
import HeaderItem from "../header-item";
import {UserOutlined} from "@ant-design/icons";

const {Header} = Layout;

const ExtHeader = (props) => {
    const menuOverlay = (
        <Menu>
            <Menu.Item>
                <a href="/">Ustawienia konta</a>
            </Menu.Item>
            <Menu.Divider/>
            <Menu.Item>
                <a href="/">Wyloguj</a>
            </Menu.Item>
        </Menu>
    );

    return (
        <Header className="site-layout-header">
            {props.admin ? (
                <div className="logo">
                    <a href="#">
                        <img src={logo} alt="Cyber konsultant" />
                    </a>
                </div>
            ) : null}
            <div style={{flex: '1 1 0%'}}/>
            <LanguageSelector lang="pl" />
            {props['_globals'].user ? (
                <Dropdown overlay={menuOverlay}>
                    <HeaderItem>
                        <Space>
                            <Avatar shape="circle" size="small" icon={<UserOutlined />} /> {props['_globals'].user.username}
                        </Space>
                    </HeaderItem>
                </Dropdown>
            ) : (
                <HeaderItem>
                    <Spin spinning={true} />
                </HeaderItem>
            )}
        </Header>
    )
}

export default ExtHeader;