import React, { useState, useEffect } from 'react';
import requiredAuth from '../../library/common/decorators/required-auth';
import Layout from '../../library/common/components/layout';
import {Row, Col, DatePicker, Form, Button, Select, Space, Layout as AntdLayout} from 'antd';
import {ReloadOutlined, ClockCircleOutlined, BarChartOutlined, DownloadOutlined} from '@ant-design/icons';
import moment  from 'moment';
import { Line } from '@ant-design/charts';

const {Content} = AntdLayout;
const {RangePicker} = DatePicker;
const {Option} = Select;

const DemoLine = () => {
    const [data, setData] = useState([]);
    useEffect(() => {
        asyncFetch();
    }, []);
    const asyncFetch = () => {
        fetch('https://gw.alipayobjects.com/os/bmw-prod/55424a73-7cb8-4f79-b60d-3ab627ac5698.json')
            .then((response) => response.json())
            .then((json) => setData(json))
            .catch((error) => {
                console.log('fetch data failed', error);
            });
    };
    var config = {
        data: data,
        xField: 'year',
        yField: 'value',
        seriesField: 'category',
        xAxis: { type: 'time' },
        yAxis: {
            label: {
                formatter: function formatter(v) {
                    return ''.concat(v).replace(/\d{1,3}(?=(\d{3})+$)/g, function (s) {
                        return ''.concat(s, ',');
                    });
                },
            },
        },
    };
    return <Line {...config} />;
};

const Home = (props) => (
    <Layout>
        <div>
            <Row gutter={16}>
                <Col className="gutter-row" span={12}>
                    <Form layout="vertical">
                        <Form.Item label="ZAKRES DAT">
                            <Space>
                                <RangePicker
                                    defaultValue={[moment('2019-09-03', 'YYYY-MM-DD'), moment('2019-11-22', 'YYYY-MM-DD')]}
                                />

                                <Button type={"primary"}>
                                    <ReloadOutlined /> Generuj
                                </Button>
                            </Space>
                        </Form.Item>
                    </Form>
                </Col>
                <Col className="gutter-row" span={12} style={{textAlign: "right"}}>
                    <Form layout="vertical">
                        <Space size={"large"}>
                            <Form.Item label="FILTRY">
                                <Space>
                                    <Select defaultValue="Wskaźnik odsłon"  onChange={() => null} suffixIcon={<ClockCircleOutlined/>}>
                                        <Option value="Wskaźnik odsłon">Wskaźnik odsłon</Option>
                                        <Option value="Yiminghe">yiminghe</Option>
                                    </Select>

                                    <Select defaultValue="Gradacja dzienna"  onChange={() => null} suffixIcon={<BarChartOutlined/>}>
                                        <Option value="Gradacja dzienna">Gradacja dzienna</Option>
                                        <Option value="Yiminghe">yiminghe</Option>
                                    </Select>
                                </Space>
                            </Form.Item>

                            <Form.Item label="Akcje">
                                <Button type={"primary"}>
                                    <DownloadOutlined /> Pobierz CSV
                                </Button>
                            </Form.Item>
                        </Space>
                    </Form>
                </Col>
            </Row>

            <Row gutter={16}>
                <Col span={24}>
                    <Content style={{borderRadius: 5, background: '#fff', padding: 30, boxSizing: 'border-box', boxShadow: '0 3px 6px -4px rgba(0, 0, 0, 0.12), 0 6px 16px 0 rgba(0, 0, 0, 0.08),\n' +
                            '  0 9px 28px 8px rgba(0, 0, 0, 0.05)'}}>
                        <DemoLine />
                    </Content>
                </Col>
            </Row>
        </div>
    </Layout>
);

export default requiredAuth(Home);