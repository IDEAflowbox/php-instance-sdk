import React, {useState} from 'react';
import {Button, Col, Form, Input, InputNumber, Row, Space, Typography} from 'antd';
import {PlusOutlined, SaveOutlined} from "@ant-design/icons";
import Content from "../../../../library/common/components/content";
import AceEditor from "react-ace";
import axios from "../../../../main/axios";

const {Title, Paragraph} = Typography;

const FramesAddAdvanced = (props) => {
    const [loading, setLoading] = useState(false);
    const [step, setStep] = useState(0);
    const [frameName, setFrameName] = useState('Nazwa ramki');
    const [form] = Form.useForm();

    const steps = [];

    steps.push(
        <Form.Item
            name="numberOfProducts"
            label="Liczba produktów wyświetlanych w ramce"
            initialValue={8}
        >
            <InputNumber min={0} max={16} />
        </Form.Item>
    );

    // steps.push(
    //     <Form.Item
    //         name="groupId"
    //         label="Scenariusz użycia"
    //     >
    //         <Input />
    //     </Form.Item>
    // );

    steps.push(
        <Form.Item
            name="xpath"
            label="Konfiguracja xPath"
        >
            <Input />
        </Form.Item>
    );

    steps.push(
        <Form.Item
            name="customHtml"
            label="Kod HTML ramki"
        >
            <AceEditor
                mode="html"
                theme="github"
                name="UNIQUE_ID_OF_DIV"
                editorProps={{ $blockScrolling: true }}
                width="100%"
                height="300px"
            />
        </Form.Item>
    );


    const handleNext = () => {
        if (step >= steps.length-1) {
            return;
        }

        setStep(step+1)
    };

    const handlePrev = () => {
        if (step <= 0) {
            return;
        }

        setStep(step-1);
    }

    const onFinish = (values) => {
        setLoading(true);

        axios
            .post(window.location.href, {
                create_advanced_frame: {
                    ...values,
                    name: frameName,
                }
            })
            .then(response => {
                window.location.href = "/frames/list";
            })
            .catch(error => {
                setLoading(false);
                console.log(error);
            })
    }

    return (
        <>
            <Row style={{marginBottom: 20}}>
                <Col span={12}>
                    <Title level={4} editable={{onChange: setFrameName}}>{frameName}</Title>
                </Col>
                <Col span={12} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                    <Paragraph strong={true}>Postęp konfiguracji: {Math.round(((step+1)/steps.length)*100)}%</Paragraph>
                </Col>
            </Row>

            <Content>
                <Form
                    form={form}
                    name="basic"
                    layout="vertical"
                    onFinish={onFinish}
                    autoComplete="off"
                >
                    {steps.map((s, i) => (
                        <div key={`step-${i}`} style={{display: i === step ? 'block' : 'none'}}>
                            {s}
                        </div>
                    ))}

                    <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                        <Space>
                            <Button disabled={step === 0 || loading} onClick={handlePrev}>Poprzedni</Button>
                            <Button onClick={handleNext} style={{display: steps.length-1 === step ? 'none' : 'inline-block'}}>Następny</Button>
                            <Button type="primary" htmlType="submit" loading={loading} icon={<SaveOutlined />} style={{display: steps.length-1 === step ? 'inline-block' : 'none'}}>
                                Zatwierdź
                            </Button>
                        </Space>
                    </div>
                </Form>
            </Content>
        </>
    )
}

export default FramesAddAdvanced;