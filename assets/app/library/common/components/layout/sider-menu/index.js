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
                <a href="/">
                    <img src={logo} alt="Cyber konsultant" />
                </a>
            </div>
            <Menu selectable={false} theme="dark" defaultSelectedKeys={[window.location.pathname]} mode="inline" defaultOpenKeys={['/recommendations', '/mapping', '/crm', '/account/billing', '/account/settings']}>
                {/*<Menu.Item key="/activities" icon={<BarChartOutlined />}>*/}
                {/*    <a href="/activities">Aktywności</a>*/}
                {/*</Menu.Item>*/}
                <SubMenu key="/recommendations" icon={<AimOutlined />} title="Rekomendacje">
                    {/*<Menu.Item key="/feed/ranking">*/}
                    {/*    <a href="/feed/ranking">Ranking produktów</a>*/}
                    {/*</Menu.Item>*/}
                    <Menu.Item key="/frames/list">
                        <a href="/frames/list">
                            Ramki rekomendacji
                        </a>
                    </Menu.Item>
                </SubMenu>
                <Menu.Item key="/feed" icon={<TagsOutlined />}>
                    <a href="/feed">
                        Feed
                    </a>
                </Menu.Item>
                <SubMenu key="/mapping" icon={<NodeIndexOutlined />} title="Mapowanie danych">
                    <Menu.Item key="/mapping/features">
                        <a href="/mapping/features">Atrybuty</a>
                    </Menu.Item>
                    <Menu.Item key="/mapping/categories">
                        <a href="/mapping/categories">Kategorie</a>
                    </Menu.Item>
                </SubMenu>
                {/*<SubMenu key="/crm" icon={<ContactsOutlined />} title="CRM">*/}
                {/*    <Menu.Item key="21">Grupa wskaźników 1</Menu.Item>*/}
                {/*    <Menu.Item key="22">Grupa wskaźników 2</Menu.Item>*/}
                {/*    <Menu.Item key="23">Lista klientów</Menu.Item>*/}
                {/*</SubMenu>*/}
                <SubMenu key="/account/billing" icon={<DollarCircleOutlined />} title="Rozliczenia">
                    <Menu.Item key="/account/billing/invoices">
                        <a href="/account/billing/invoices">Faktury</a>
                    </Menu.Item>
                    <Menu.Item key="/account/billing/payments">
                        <a href="/account/billing/payments">Płatności</a>
                    </Menu.Item>
                </SubMenu>
                <SubMenu key="/account/settings" icon={<SettingOutlined />} title="Ustawienia">
                    <Menu.Item key="/account/settings/account">
                        <a href="/account/settings/account">Dane konta</a>
                    </Menu.Item>
                    <Menu.Item key="/account/settings/billing">
                        <a href="/account/settings/billing">Dane rozliczeniowe</a>
                    </Menu.Item>
                </SubMenu>
            </Menu>
        </Sider>
    )
}

export default SiderMenu