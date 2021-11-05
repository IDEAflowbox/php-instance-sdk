import React, {useState} from 'react';
import {Button, Col, DatePicker, Dropdown, Form, Input, Row, Space, Typography} from 'antd';
import ListView from "../../../../../library/common/components/list-view";
import {PlusOutlined, SaveOutlined, SearchOutlined} from "@ant-design/icons";
import {useQueryParam} from "../../../../../library/utilities/use-query-param";
import Content from "../../../../../library/common/components/content";
import EmojiPicker from 'emoji-picker-react';
import EmojiPickerInput from "../../../../../library/common/components/emoji-picker-input";
import {useForm} from "antd/es/form/Form";
import moment from 'moment';
import SendersSelect from "../../../../../library/common/components/senders-select";
import AceEditor from "react-ace";
import axios from "../../../../../main/axios";
import SegmentsSelect from "../../../../../library/common/components/segments-select";
const HtmlToReactParser = require('html-to-react').Parser;

const {Title} = Typography;

const MailingAdd = (props) => {
    console.log(props);

    const [loading, setLoading] = useState(false);
    const [preview, setPreview] = useState("");
    const [searchValue, setSearchValue] = useState(null);
    const [search] = useQueryParam('search');
    const [form] = useForm();

    const handleChangeText = (e) => {
        setSearchValue(e.target.value)
    }

    const onFinish = (values) => {
        console.log(values);
        setLoading(true);

        axios
            .post(window.location.href, {
                create_mailing: {
                    ...values,
                    segmentId: values.segmentId.value,
                    senderId: values.senderId.value,
                }
            })
            .then(response => {
                // setLoading(false);
                window.location.href = '/crm/mailing';
            })
            .catch(error => {
                setLoading(false);
                const errors = error.response.data.form.errors.children;
                const errorsKeys = Object.keys(errors);
                const fields = [];

                errorsKeys.forEach(input => {
                    fields.push({
                        name: input,
                        value: values[input],
                        errors: errors[input].errors ? errors[input].errors : []
                    })
                })
                form.setFields(fields);
            })
    }

    const htmlToReactParser = new HtmlToReactParser();
    const reactElement = htmlToReactParser.parse(preview);

    return (
        <>
            <Content>
                <Form
                    form={form}
                    name="basic"
                    layout="vertical"
                    onFinish={onFinish}
                    autoComplete="off"
                    onFieldsChange={e => {
                        if (e[0].name[0] === 'contents') {
                            setPreview(e[0].value);
                        }
                    }}
                >
                    <Form.Item
                        name="name"
                        label={<Title level={4}>Nazwa wiadomości</Title>}
                        style={{marginTop: 0}}
                    >
                        <EmojiPickerInput />
                    </Form.Item>

                    <Form.Item
                        name="startDate"
                        label="Wysyłka"
                    >
                        <DatePicker showTime/>
                    </Form.Item>

                    <Form.Item
                        name="senderId"
                        label="Nadawca"
                    >
                        <SendersSelect />
                    </Form.Item>

                    <Form.Item
                        name="segmentId"
                        label="Segment"
                    >
                        <SegmentsSelect />
                    </Form.Item>

                    <Form.Item
                        name="title"
                        label="Tytuł wiadomości"
                    >
                        <EmojiPickerInput />
                    </Form.Item>

                    <Form.Item
                        name="contents"
                        label="Treść wiadomości"
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

                    <Form.Item
                        name="utmCampaign"
                        label="Nazwa kampanii (Do monitorowania Google Analytics)"
                    >
                        <Input />
                    </Form.Item>

                    <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                        <Button type="primary" htmlType="submit" loading={loading} icon={<SaveOutlined />}>
                            Zatwierdź
                        </Button>
                    </div>
                </Form>
            </Content>

            <Title level={4} style={{marginTop: 20}}>Podgląd</Title>
            <Content>
                {reactElement}
            </Content>
        </>
    )
}

export default MailingAdd;