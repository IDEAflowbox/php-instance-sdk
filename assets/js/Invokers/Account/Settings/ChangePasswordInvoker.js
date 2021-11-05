import React from "react";
import BaseInvoker from "../../BaseInvoker";
import ChangePassword from "../../../../app/modules/Account/Settings/ChangePassword";

class ChangePasswordInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<ChangePassword {...this.props}/> , document.getElementById('content'));
    }
}

export default ChangePasswordInvoker;