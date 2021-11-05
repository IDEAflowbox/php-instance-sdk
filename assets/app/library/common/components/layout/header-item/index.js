import React from "react";
import './index.scss';

const HeaderItem = (props) => (
    <div {...props} className="header-item">
        {props.children}
    </div>
)

export default HeaderItem;