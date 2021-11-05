import React, {useState} from 'react';
import {Form, Input, Button, Space, Row, Col, Table} from 'antd';
import Title from "antd/es/typography/Title";
import {DeleteOutlined} from "@ant-design/icons";
import SegmentParameterTypeSelector, {SegmentParameterTypesTranslations} from "../../../../library/common/components/segment-parameter-type-selector";
import SegmentParameterOperatorSelector
    from "../../../../library/common/components/segment-parameter-operator-selector";
import axios from "../../../../main/axios";

class AddSegmentModal extends React.Component
{
    constructor(props) {
        super(props);

        this.state = {
            loading: false,
            params: [],
            addParam: false,
            addParamForm: {
                type: undefined,
                operator: undefined,
                value: undefined
            }
        }
    }

    renderParams() {
        const {params} = this.state;
        const deleteParam = (i) => {
            params.splice(i, 1);
            this.setState({
                params: [...params],
            });
        }

        const columns = [
            {
                title: 'type',
                key: 'type',
                dataIndex: 'type',
                render: (type) => SegmentParameterTypesTranslations[type]
            },
            {
                title: 'operator',
                key: 'operator',
                dataIndex: 'operator',
            },
            {
                title: 'value',
                key: 'value',
                dataIndex: 'value',
            },
            {
                title: '',
                key: 'actions',
                align: 'right',
                render: (_, item, i) => (
                    <Button type="link" onClick={deleteParam.bind(this, i)}>
                        <DeleteOutlined />
                    </Button>
                )
            }
        ]

        if (this.state.params.length === 0) return null;

        return (
            <>
                <Title level={5} style={{padding: 3, background: '#f7f7f7', textTransform: 'uppercase'}}>Parametry</Title>
                <Table
                    size="small"
                    pagination={false}
                    dataSource={this.state.params}
                    columns={columns}
                    showHeader={false}
                    rowKey="type"
                />
            </>
        )
    }

    renderAddParametersForm() {
        const {addParamForm} = this.state;
        const {type, operator, value} = addParamForm;

        function onChangeType(value) {
            this.setState({
                addParamForm: {
                    ...addParamForm,
                    type: value
                }
            })
        }

        function onChangeOperator(value) {
            this.setState({
                addParamForm: {
                    ...addParamForm,
                    operator: value
                }
            })
        }

        function onChangeValue(e) {
            this.setState({
                addParamForm: {
                    ...addParamForm,
                    value: e.target.value
                }
            })
        }

        const handleApply = () => {
            if (!this.state.addParam) {
                this.setState({
                    addParam: !this.state.addParam,
                });
                return;
            }

            this.setState({
                addParam: !this.state.addParam,
                addParamForm: {
                    type: undefined,
                    operator: undefined,
                    value: undefined,
                },
                params: [
                    ...this.state.params,
                    {
                        ...this.state.addParamForm
                    }
                ]
            });
        }

        if (!this.state.addParam) {
            return (
                <Row gutter={16}>
                    <Button onClick={handleApply}>
                        Dodaj parametr
                    </Button>
                </Row>
            )
        }

        return (
            <>
                <Row gutter={16}>
                    <Col span={24}>
                        <div className="ant-row ant-form-item">
                            <div className="ant-col ant-form-item-label">
                                <label title="Parametr">Parametr</label>
                            </div>
                            <div className="ant-col ant-form-item-control">
                                <SegmentParameterTypeSelector value={type} onChange={onChangeType.bind(this)} style={{width: '100%'}} />
                            </div>
                        </div>
                    </Col>
                </Row>
                <Row gutter={16}>
                    <Col span={8}>
                        <div className="ant-row ant-form-item">
                            <div className="ant-col ant-form-item-label">
                                <label title="Operator">Operator</label>
                            </div>
                            <div className="ant-col ant-form-item-control">
                                <SegmentParameterOperatorSelector value={operator} onChange={onChangeOperator.bind(this)} />
                            </div>
                        </div>
                    </Col>
                    <Col span={8}>
                        <div className="ant-row ant-form-item">
                            <div className="ant-col ant-form-item-label">
                                <label title="Wartość">Wartość</label>
                            </div>
                            <div className="ant-col ant-form-item-control">
                                <Input onChange={onChangeValue.bind(this)} value={value}/>
                            </div>
                        </div>
                    </Col>
                    <Col span={8} style={{display: 'flex', alignItems: 'flex-end', flexDirection: 'column'}}>
                        <div className="ant-row ant-form-item">
                            <div className="ant-col ant-form-item-label">
                                <label title="">&nbsp;</label>
                            </div>
                            <div className="ant-col ant-form-item-control">
                                <Button onClick={handleApply}>
                                    Zatwierdź
                                </Button>
                            </div>
                        </div>
                    </Col>
                </Row>
            </>
        )
    }

    render() {
        const {close} = this.props;
        const {loading, params} = this.state;

        const onFinish = (values) => {
            this.setState({
                loading: true
            });

            axios
                .post(window.location.href, {
                    create_segment: {
                        ...values,
                        parameters: params
                    }
                })
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    this.setState({
                        loading: false
                    });
                    // const errors = error.response.data.form.errors.children;
                    // const errorsKeys = Object.keys(errors);
                    // const fields = [];
                    //
                    //
                    // errorsKeys.forEach(input => {
                    //     fields.push({
                    //         name: input,
                    //         value: values[input],
                    //         errors: errors[input].errors ? errors[input].errors : []
                    //     })
                    // })
                    // form.setFields(fields);
                })
        };

        const onFinishFailed = (errorInfo) => {
        };

        return (
            <Form
                // form={form}
                name="basic"
                layout="vertical"
                onFinish={onFinish}
                onFinishFailed={onFinishFailed}
                autoComplete="off"
            >
                <Title level={5}>Nowy segment</Title>

                <Row gutter={16}>
                    <Col span={24}>
                        <Form.Item
                            label="Nazwa segmentu"
                            name="name"
                            rules={[
                                {
                                    required: true
                                },
                            ]}
                        >
                            <Input />
                        </Form.Item>
                    </Col>
                </Row>
                <Row gutter={16}>
                    <Col span={24}>
                        <Form.Item
                            label="Kolor"
                            name="color"
                            rules={[
                                {
                                    required: true
                                },
                            ]}
                        >
                            <Input />
                        </Form.Item>
                    </Col>
                </Row>
                <Row gutter={16}>
                    <Col span={24}>
                        {this.renderParams()}
                    </Col>
                </Row>

                {this.renderAddParametersForm()}

                <Form.Item>
                    <div style={{display: 'flex', flexDirection: 'column', alignItems: 'flex-end'}}>
                        <Space>
                            <Button type="default" onClick={close} disabled={loading}>
                                Anuluj
                            </Button>

                            <Button type="primary" htmlType="submit" loading={loading}>
                                Dalej
                            </Button>
                        </Space>
                    </div>
                </Form.Item>
            </Form>
        )
    }
}

export default AddSegmentModal;