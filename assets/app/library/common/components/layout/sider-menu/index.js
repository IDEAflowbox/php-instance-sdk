import React, {useState} from 'react';
import logo from "../../../../../resources/images/logo.svg";
import {Menu, Layout} from "antd";
import {
    AimOutlined, BarChartOutlined,
    ContactsOutlined,
    DollarCircleOutlined,
    NodeIndexOutlined,
    SettingOutlined, TagsOutlined,
    UserOutlined
} from "@ant-design/icons";

const {Sider} = Layout;
const {SubMenu} = Menu;

const SiderMenu = (props) => {
    const [collapsed, setCollapsed] = useState(false)

    return (
        <Sider collapsible collapsed={collapsed} onCollapse={setCollapsed} width={240}>
            <div className="logo">
                <a href="#">
                    <img src={logo} alt="Cyber konsultant" />
                </a>
            </div>
            <Menu theme="dark" defaultSelectedKeys={['1']} mode="inline">
                <Menu.Item key="1" icon={<BarChartOutlined />}>
                    Aktywności
                </Menu.Item>
                <SubMenu key="sub1" icon={<AimOutlined />} title="Rekomendacje">
                    <Menu.Item key="3">Ranking produktów</Menu.Item>
                    <Menu.Item key="4">Ramki rekomendacji</Menu.Item>
                </SubMenu>
                <Menu.Item key="10" icon={<TagsOutlined />}>
                    Feed
                </Menu.Item>
                <SubMenu key="sub2" icon={<NodeIndexOutlined />} title="Mapowanie danych">
                    <Menu.Item key="6">Atrybuty</Menu.Item>
                    <Menu.Item key="8">Kategorie</Menu.Item>
                </SubMenu>
                <SubMenu key="sub3" icon={<ContactsOutlined />} title="CRM">
                    <Menu.Item key="21">Grupa wskaźników 1</Menu.Item>
                    <Menu.Item key="22">Grupa wskaźników 2</Menu.Item>
                    <Menu.Item key="23">Lista klientów</Menu.Item>
                </SubMenu>
                <SubMenu key="sub4" icon={<DollarCircleOutlined />} title="Rozliczenia">
                    <Menu.Item key="31">Faktury</Menu.Item>
                    <Menu.Item key="32">Płatności</Menu.Item>
                </SubMenu>
                <SubMenu key="sub5" icon={<SettingOutlined />} title="Ustawienia">
                    <Menu.Item key="41">Dane konta</Menu.Item>
                    <Menu.Item key="42">Dane rozliczeniowe</Menu.Item>
                </SubMenu>
            </Menu>
        </Sider>
    )
}

export default SiderMenu