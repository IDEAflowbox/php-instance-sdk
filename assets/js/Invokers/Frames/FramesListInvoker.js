import React from "react";
import BaseInvoker from "../BaseInvoker";
import FramesList from "../../../app/modules/Frames/List";

class FramesListInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<FramesList {...this.props}/> , document.getElementById('content'));
    }
}

export default FramesListInvoker;