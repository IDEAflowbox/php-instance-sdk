import React from "react";
import BaseInvoker from "../../BaseInvoker";
import AccountDetails from "../../../../app/modules/Account/Settings/AccountDetails";

class AccountDetailsInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<AccountDetails {...this.props}/> , document.getElementById('content'));
    }
}

export default AccountDetailsInvoker;