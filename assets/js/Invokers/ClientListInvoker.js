import React from "react";
import ReactDOM from "react-dom";
import ClientList from "../../app/modules/Admin/ClientList";

class ClientListInvoker extends React.PureComponent {
    componentDidMount() {
        ReactDOM.render(<ClientList {...this.props}/> , document.getElementById('content'));
    }

    render() {
        return null;
    }
}

export default ClientListInvoker;