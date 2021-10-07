import React from 'react';
import './index.scss';

const Content = (props) => (
    <div className="ck--content">
        {props.children}
    </div>
)

export default Content;