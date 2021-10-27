import React from "react";
import BaseInvoker from "../../BaseInvoker";
import UsersList from "../../../../app/modules/Crm/Users/List";

class ListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<UsersList {...this.props}/> , document.getElementById('content'));
    }
}

export default ListInvoker;