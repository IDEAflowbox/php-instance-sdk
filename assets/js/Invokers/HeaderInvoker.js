import React from "react";
import ReactDOM from "react-dom";
import Header from "../../app/library/common/components/layout/header";

class HeaderInvoker extends React.PureComponent {
    componentDidMount() {
        ReactDOM.render(<Header {...this.props}/>, document.getElementById('header'));
    }

    render() {
        return null;
    }
}

export default HeaderInvoker;