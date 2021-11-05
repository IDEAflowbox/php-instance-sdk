import React from "react";
import BaseInvoker from "../../../BaseInvoker";
import SendersList from "../../../../../app/modules/Crm/Mailing/Senders/List";

class ListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<SendersList {...this.props}/> , document.getElementById('content'));
    }
}

export default ListInvoker;