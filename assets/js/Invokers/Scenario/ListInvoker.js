import React from "react";
import BaseInvoker from "../BaseInvoker";
import FeedList from "../../../app/modules/Scenario/List";

class ListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<FeedList {...this.props}/> , document.getElementById('content'));
    }
}

export default ListInvoker;