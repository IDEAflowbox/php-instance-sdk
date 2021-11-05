import React from "react";
import BaseInvoker from "./BaseInvoker";
import ClientList from "../../app/modules/Admin/ClientList";

class ClientListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<ClientList {...this.props}/> , document.getElementById('content'));
    }
}

export default ClientListInvoker;