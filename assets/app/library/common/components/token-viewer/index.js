import React, {useState} from 'react';
import {Button} from "antd";

const TokenViewer = (props) => {
    const [visible, setVisible] = useState(false);
    return visible ? props.token : <Button onClick={() => setVisible(true)}>Odkryj token</Button>;
}

TokenViewer.defaultProps = {
    token: null,
}

export default TokenViewer;