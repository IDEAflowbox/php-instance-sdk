import {Avatar, Dropdown, Space, Spin, Layout, Menu} from "antd";
import React from "react";
import LanguageSelector from "../../language-selector";
import {AppContext} from "../../../providers/app/context";
import HeaderItem from "../header-item";
import {UserOutlined} from "@ant-design/icons";

const {Header} = Layout;

const ExtHeader = (props) => {
    console.log(props);

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
            <div style={{flex: '1 1 0%'}}/>

            <LanguageSelector lang="pl" />
            {props['_global'].user ? (
                <Dropdown overlay={menuOverlay}>
                    <HeaderItem>
                        <Space>
                            <Avatar shape="circle" size="small" icon={<UserOutlined />} /> {props['_global'].user.username}
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