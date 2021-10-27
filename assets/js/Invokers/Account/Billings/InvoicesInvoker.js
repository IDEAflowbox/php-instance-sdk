import React from "react";
import BaseInvoker from "../../BaseInvoker";
import Invoices from "../../../../app/modules/Account/Billing/Invoices";

class InvoicesInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<Invoices {...this.props}/> , document.getElementById('content'));
    }
}

export default InvoicesInvoker;