import React from "react";
import BaseInvoker from "./BaseInvoker";
import ClientDetails from "../../app/modules/Admin/ClientDetails";

class ClientDetailsInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<ClientDetails {...this.props}/> , document.getElementById('content'));
    }
}

export default ClientDetailsInvoker;