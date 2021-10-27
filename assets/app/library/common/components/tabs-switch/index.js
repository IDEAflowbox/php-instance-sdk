import React from 'react';
import classNames from "classnames";
import {Badge} from "antd";

const TabsSwitch = (props) => {
    return (
        <div className="ant-tabs ant-tabs-top">
            <div role="tablist" className="ant-tabs-nav">
                <div style={{width: '100%', height: 2, background: 'rgba(0, 0, 0, 0.05)', position: 'absolute', bottom: 0}}/>
                <div className="ant-tabs-nav-wrap">
                    <div className="ant-tabs-nav-list">
                        {props.items.map((item, index) => {
                            const active = props.activeKeys.indexOf(item.key) !== -1;
                            return (
                                <div className={classNames({
                                    'ant-tabs-tab': true,
                                    'ant-tabs-tab-active': active,
                                })} key={item.key} style={active ? {borderBottom: '2px solid #FCDE51', paddingLeft: 15, paddingRight: 15} : {}}>
                                    <div onClick={() => item.onClick && item.onClick(item, index)} role="tab" aria-selected={active} className="ant-tabs-tab-btn" tabIndex={index} id={`rc-tabs-0-tab-${index}`} aria-controls={`rc-tabs-0-panel-${index}`}>
                                        {item.prefix}{item.title}{item.title ? <Badge count={item.badge} style={{ backgroundColor: 'rgb(252, 222, 81)', color: '#000', border: 'none', marginLeft: 10}}/> : null}
                                    </div>
                                </div>
                            )
                        })}
                    </div>
                </div>
            </div>
        </div>
    )
}

TabsSwitch.defaultProps = {
    items: [],
    activeKeys: [],
}

export default TabsSwitch;