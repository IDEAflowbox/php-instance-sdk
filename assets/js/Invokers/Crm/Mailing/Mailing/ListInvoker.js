import React from "react";
import BaseInvoker from "../../../BaseInvoker";
import MailingList from "../../../../../app/modules/Crm/Mailing/Mailing/List";

class ListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<MailingList {...this.props}/> , document.getElementById('content'));
    }
}

export default ListInvoker;