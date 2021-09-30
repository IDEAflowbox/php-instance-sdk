import React, {useState} from 'react';
import styled, {css} from "styled-components";
import {Typography} from 'antd';
import {Form, Input, Button, Checkbox} from 'antd';
import {Link} from 'react-router-dom';
import background from '../../resources/images/login-background.jpeg';
import {AuthContext} from "../../library/common/providers/auth/context";
import requiredNoAuth from "../../library/common/decorators/required-no-auth";
import toastr from "../../library/utilities/toastr";
import {history} from "../../main/history";
import './styles.scss';
const {Text, Title} = Typography;

const PhotoWrapper = styled.div`
width: 100%;
height: 100%;
${props => props.url && css`
background: url('${props.url}') no-repeat;
background-size: cover;
background-position: center;
`}
`;

const Login = (props) => {
    const [form] = Form.useForm();
    const [requesting, setRequesting] = useState(false);

    return (
        <AuthContext.Consumer>
            {(authState) => {
                const onFinish = (values) => {
                    setRequesting(true);

                    authState
                        .login(values.email, values.password)
                        .then((success) => {
                            history.push('/');
                        })
                        .catch(() => {
                            setRequesting(false);
                            toastr.error(
                                'Unable to authenticate',
                                'The credentials you entered did not matched our records. Please recheck and try again.'
                            );
                        })
                    ;
                };

                return (
                    <div id="login-page">
                        <div className="wrapper">
                            <div className="intro-container">
                                <PhotoWrapper url={background}/>
                            </div>
                            <div className="form-container">
                                <div className="form-wrapper">
                                    <Title level={3}>Login</Title>

                                    <div className="form-body">
                                        <Title level={5}>Login to your account</Title>
                                        <Text type="secondary">We believe that we have made a step forward here and hope that you will like it.</Text>

                                        <Form
                                            form={form}
                                            layout="vertical"
                                            className="login-form"
                                            initialValues={{remember: false}}
                                            onFinish={onFinish}
                                        >
                                            <Form.Item
                                                name="email"
                                                label="E-mail address"
                                                rules={[{required: true, message: 'Please input your e-mail address!'}]}
                                                required
                                            >
                                                <Input placeholder="Eg. john@doe.com" />
                                            </Form.Item>
                                            <Form.Item
                                                name="password"
                                                label="Password"
                                                rules={[{required: true, message: 'Please input your password!'}]}
                                                required
                                            >
                                                <Input type="password" placeholder="Enter your password" />
                                            </Form.Item>
                                            <Form.Item>
                                                <Form.Item name="remember" valuePropName="checked" noStyle>
                                                    <Checkbox>Remember me</Checkbox>
                                                </Form.Item>

                                                <Link className="login-form-forgot" to="/forgot-password">
                                                    Forgot password
                                                </Link>
                                            </Form.Item>
                                            <Form.Item>
                                                <Button
                                                    htmlType="submit"
                                                    type="primary"
                                                    className="login-form-button"
                                                    disabled={requesting}
                                                    loading={requesting}
                                                >Log in</Button>
                                            </Form.Item>

                                            <p style={{textAlign: 'center'}}>Don't have an account yet? <Link to="/register">Join now</Link></p>
                                        </Form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                )
            }}
        </AuthContext.Consumer>
    )
}

export default requiredNoAuth(Login);