import React from 'react';
import {Badge, Col, Row, Space, Typography} from 'antd';
import ListView from "../../../../library/common/components/list-view";
import Content from "../../../../library/common/components/content";
import List from "../../../../library/common/components/list";
import SegmentName from "../../../../library/common/components/segment-name";
import EventsList from "../../../../library/common/components/events-list";

const {Title} = Typography;

const UserDetails = (props) => {
    console.log(props);
    const {user} = props;

    const userInfo = [
        // {
        //     name: 'Kolor',
        //     value: props.color,
        //     render: (color) => <Badge color={color} text={color} />,
        // },
        {
            name: 'Kraj',
            value: user.country
        },
        {
            name: 'Miasto',
            value: user.city
        },
        {
            name: 'E-mail',
            value: user.email
        },
        {
            name: 'Płeć',
            value: user.sex,
        },
        {
            name: 'Numer telefonu',
            value: user.phoneNumber,
        },
    ];

    const segments = [
        {
            name: 'Segmentacja',
            value: user.segments,
            render: (segments) => {
                return (
                    <Space wrap={true}>
                        {segments.map(segment => <SegmentName key={segment.id} color={segment.color} name={segment.name} />)}
                    </Space>
                )
            }
        }
    ];

    return (
        <>
            <Title level={4}>CRM / {user.firstName} {user.lastName}</Title>
            <Content>
                <Title level={4}>{user.firstName} {user.lastName}</Title>
                <Title level={5} style={{padding: 3, background: '#f7f7f7', textTransform: 'uppercase'}}>Podsumowanie</Title>
                <Row>
                    <Col span={12}>
                        <List data={userInfo}/>
                    </Col>
                    <Col span={12}>
                        <List data={segments}/>
                    </Col>
                </Row>
            </Content>
            <Content style={{marginTop: 20}}>
                <EventsList dataSource={user.events} size="small" />
            </Content>
        </>
    )
}

export default UserDetails;