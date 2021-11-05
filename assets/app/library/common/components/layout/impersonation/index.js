import React from 'react';
import {Button, Col, Row} from "antd";

const Impersonation = (props) => {
    if (!props.impersonationExitPath) return null;

    return (
        <Row>
            <Col span={24}>
                <div className="impersonation--wrapper">
                    <span>Administrator zalogowany jako: {props.name}</span>
                    <Button type="ghost" href={props.impersonationExitPath}>Powrót do panelu administratora</Button>
                </div>
            </Col>
        </Row>
    )
}

Impersonation.defaultProps = {
    impersonationExitPath: null,
    name: null,
}

export default Impersonation;