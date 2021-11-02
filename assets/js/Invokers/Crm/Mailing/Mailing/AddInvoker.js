import React from "react";
import BaseInvoker from "../../../BaseInvoker";
import MailingList from "../../../../../app/modules/Crm/Mailing/Mailing/List";
import MailingAdd from "../../../../../app/modules/Crm/Mailing/Mailing/Add";

class AddInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<MailingAdd {...this.props}/> , document.getElementById('content'));
    }
}

export default AddInvoker;