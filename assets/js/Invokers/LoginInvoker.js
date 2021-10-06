import React from "react";
import ReactDOM from "react-dom";
import Login from "../../app/modules/Authorization/Login";

class LoginInvoker extends React.PureComponent {
    componentDidMount() {
        ReactDOM.render(<Login {...this.props}/> , document.getElementById('form'));
    }

    render() {
        return null;
    }
}

export default LoginInvoker;