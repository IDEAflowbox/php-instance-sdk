import React from "react";
import BaseInvoker from "../../BaseInvoker";
import BillingDetails from "../../../../app/modules/Account/Settings/BillingDetails";

class BillingDetailsInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<BillingDetails {...this.props}/> , document.getElementById('content'));
    }
}

export default BillingDetailsInvoker;