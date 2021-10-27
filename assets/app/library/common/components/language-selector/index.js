import React, {PropsWithChildren} from "react";
import {Dropdown, Menu, Space} from "antd";
import {DownOutlined} from "@ant-design/icons";
import HeaderItem from '../layout/header-item'
import PLFlag from '../../../../resources/images/pl-flag.png';
import USFlag from '../../../../resources/images/us-flag.png';

const languages = [
    {
        code: 'pl',
        name: 'Polski',
        flag: PLFlag
    },
    // {
    //     code: 'en',
    //     name: 'English',
    //     flag: USFlag
    // }
];

const LanguageSelector = (props) => {
    const flag = languages.find(e => e.code === props.lang)?.flag

    const dropdown = (
        <Menu>
            {languages.map(flag => (
                <Menu.Item key={`lang-${flag.code}`} icon={<img src={flag.flag} style={{width: 20}}/>} disabled={props.lang === flag.code}>
                    <span style={{paddingLeft: 10}}>{flag.name}</span>
                </Menu.Item>
            ))}
        </Menu>
    );

    return (
        <Dropdown overlay={dropdown}>
            <HeaderItem>
                <Space>
                    <img src={flag} style={{width: 24}} alt="Polski"/> Polski
                </Space>
            </HeaderItem>
        </Dropdown>
    )
}

export default LanguageSelector;