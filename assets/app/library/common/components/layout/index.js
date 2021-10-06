import React from 'react';
import {Layout} from 'antd';
import styled from "styled-components";

const {Content, Footer} = Layout;

const MainLayout = (props) => {
    return (
        <Layout style={{ minHeight: '100vh' }} className={"ant-layout ant-layout-has-sider"}>
            {!props.admin ? <div id="sider-menu"/> : null}
            <Layout className="site-layout">
                <div id="header"/>

                <Content style={{ margin: '0 16px' }}>
                    <div className="site-layout-background" style={{ padding: 24, minHeight: 360 }}>
                        <div id="content"/>
                    </div>
                </Content>
                <Footer style={{ textAlign: 'center' }}>Ant Design ©2018 Created by Ant UED</Footer>
            </Layout>
        </Layout>
    )
}

export const Container = styled.div`
background: #fff;
padding: 20px;
border-radius: 4px;
margin: 0 auto;
`;

export default MainLayout;