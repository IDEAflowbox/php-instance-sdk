import React from "react";
import BaseInvoker from "../../BaseInvoker";
import Payments from "../../../../app/modules/Account/Billing/Payments";

class PaymentsInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<Payments {...this.props}/> , document.getElementById('content'));
    }
}

export default PaymentsInvoker;