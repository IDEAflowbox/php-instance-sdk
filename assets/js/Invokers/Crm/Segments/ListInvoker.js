import React from "react";
import BaseInvoker from "../../BaseInvoker";
import SegmentsList from "../../../../app/modules/Crm/Segments/List";

class ListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<SegmentsList {...this.props}/> , document.getElementById('content'));
    }
}

export default ListInvoker;