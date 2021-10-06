import React from 'react';
import {Layout} from 'antd';
const {Content} = Layout;

const NotAuthLayout = (props) => {
    return (
        <Layout style={{ minHeight: '100vh' }} className={"ant-layout ant-layout-has-sider"}>
            <Layout className="site-layout">
                <Content style={{ margin: '0 16px', display: 'flex', alignItems: 'center', justifyContent: 'center' }}>
                    <div className="no-auth-layout--container">
                        <div id="form"/>
                    </div>
                </Content>
            </Layout>
        </Layout>
    )
}

export default NotAuthLayout;