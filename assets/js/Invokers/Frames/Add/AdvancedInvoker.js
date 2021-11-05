import React from "react";
import BaseInvoker from "../../BaseInvoker";
import FramesAddAdvanced from "../../../../app/modules/Frames/Add/Advanced";

class FramesAddAdvancedInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<FramesAddAdvanced {...this.props}/> , document.getElementById('content'));
    }
}

export default FramesAddAdvancedInvoker;