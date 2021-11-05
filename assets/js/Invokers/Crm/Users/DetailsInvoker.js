import React from "react";
import BaseInvoker from "../../BaseInvoker";
import UserDetails from "../../../../app/modules/Crm/Users/Details";

class DetailsInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<UserDetails {...this.props}/> , document.getElementById('content'));
    }
}

export default DetailsInvoker;