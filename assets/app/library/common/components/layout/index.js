import React from 'react';
// import {Link, useLocation} from "react-router-dom";
// import {history} from "../../../../main/history";
// import menu from './menu';
// import ProLayout  from '@ant-design/pro-layout';
import {Dropdown, Breadcrumb, Layout, Menu, Avatar, Space, Spin} from 'antd';
// import {UserOutlined} from "@ant-design/icons";
// import HeaderItem from './header-item';
// import logo from '../../../../resources/images/logo.svg';
// import {AppContext} from "../../providers/app/context";
import styled from "styled-components";
// import SiderMenu from "./sider-menu";
// import LanguageSelector from '../language-selector';
// import "./index.scss";
// import SiderMenu from "./sider-menu";
// import MenuCounter from "@ant-design/pro-layout/es/components/SiderMenu/Counter";

const {Header, Content, Footer, Sider} = Layout;
// const {SubMenu} = Menu;

const MainLayout = (props) => {
    return (
        <Layout style={{ minHeight: '100vh' }} className={"ant-layout ant-layout-has-sider"}>
            <div id="sider-menu"/>
            <Layout className="site-layout">
                <div id="header"/>

                <Content style={{ margin: '0 16px' }}>
                    <Breadcrumb style={{ margin: '16px 0' }}>
                        <Breadcrumb.Item>User</Breadcrumb.Item>
                        <Breadcrumb.Item>Bill</Breadcrumb.Item>
                    </Breadcrumb>
                    <div className="site-layout-background" style={{ padding: 24, minHeight: 360 }}>
                        Bill is a cat.
                    </div>
                </Content>
                <Footer style={{ textAlign: 'center' }}>Ant Design ©2018 Created by Ant UED</Footer>
            </Layout>
        </Layout>
    )
}

// const Layout = (props) => {
//     // const [settings, setSetting] = useState<Partial<ProSettings> | undefined>({ fixSiderbar: true });
//
//     const menuOverlay = (
//         <Menu>
//             <Menu.Item>
//                 <a href="/">Ustawienia konta</a>
//             </Menu.Item>
//             <Menu.Divider/>
//             <Menu.Item>
//                 <a href="/">Wyloguj</a>
//             </Menu.Item>
//         </Menu>
//     );
//
//     return (
//
//     )
//
//     return (
//         <ProLayout
//             fixSiderbar
//             siderWidth={240}
//             location={useLocation()}
//             // menu={{request: async () => menu, defaultOpenAll: true}}
//             route={{
//                 routes: menu,
//             }}
//             menu={{ defaultOpenAll: true }}
//
//             menuItemRender={(item, dom) => (
//                 <Link to={item.path}>{dom}</Link>
//             )}
//             logo={logo}
//             title="Cyber Konsultnat"
//             menuHeaderRender={logo => <a href="/">{logo}</a>}
//             rightContentRender={() => (
//                 <>
//                     <LanguageSelector lang="pl" />
//
//                     <AppContext.Consumer>
//                         {(appState) => {
//                             if (!appState.initialized) {
//                                 return (
//                                     <HeaderItem>
//                                         <Spin spinning={true} />
//                                     </HeaderItem>
//                                 );
//                             }
//
//                             return (
//                                 <Dropdown overlay={menuOverlay}>
//                                     <HeaderItem>
//                                         <Space>
//                                             <Avatar shape="circle" size="small" icon={<UserOutlined />} /> {appState.user?.email}
//                                         </Space>
//                                     </HeaderItem>
//                                 </Dropdown>
//                             );
//                         }}
//                     </AppContext.Consumer>
//                 </>
//             )}
//         >
//             {props.children}
//         </ProLayout>
//     );
// };


export const Container = styled.div`
background: #fff;
padding: 20px;
border-radius: 4px;
// max-width: 1200px;
margin: 0 auto;
`;

export default MainLayout;