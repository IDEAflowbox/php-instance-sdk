import React, {useState, useRef} from 'react';
import styled, {css} from "styled-components";
import {Typography} from 'antd';
import {Form as AntdForm, Input, Button, Checkbox} from 'antd';
import Form from '../../library/common/components/form';
import logo from '../../resources/images/logo-black.svg';
import './styles.scss';

const {Text, Title} = Typography;
const {Item} = AntdForm;

const Login = (props) => {
    return (
        <div className="form-wrapper login-page">
            <div className="logo">
                <img src={logo} alt="Cyber konsultant" />
            </div>

            <div className="form-body">
                <Form method="post">
                    <Item
                        name="email"
                        label="Adres e-mail"
                        required
                    >
                        <Input placeholder="np. jan.kowalski@gmail.com" name="email" />
                    </Item>
                    <Item
                        name="password"
                        label="Hasło"
                        required
                    >
                        <Input type="password" placeholder="Wprowadź hasło" name="password" />
                    </Item>
                    {/*<Item>*/}
                    {/*    <Item name="remember" valuePropName="checked" noStyle>*/}
                    {/*        <Checkbox>Remember me</Checkbox>*/}
                    {/*    </Item>*/}

                    {/*    <a className="login-form-forgot" href="/forgot-password">*/}
                    {/*        Forgot password*/}
                    {/*    </a>*/}
                    {/*</Item>*/}
                    <Item>
                        <Button
                            htmlType="submit"
                            type="primary"
                            className="login-form-button"
                            block
                        >Zaloguj</Button>
                    </Item>

                    <Input type="hidden" name="_csrf_token" value={props.csrf}/>
                    {/*<p style={{textAlign: 'center'}}>Don't have an account yet? <a href="/register">Join now</a></p>*/}
                </Form>
            </div>
        </div>
    )
}

export default Login;