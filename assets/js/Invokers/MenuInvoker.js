import React from "react";
import ReactDOM from "react-dom";
import Menu from "../../app/library/common/components/layout/sider-menu";

class MenuInvoker extends React.PureComponent {
    componentDidMount() {
        ReactDOM.render(<Menu {...this.props}/> , document.getElementById('sider-menu'));
    }

    render() {
        return null;
    }
}

export default MenuInvoker;