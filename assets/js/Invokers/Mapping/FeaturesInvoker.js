import React from "react";
import BaseInvoker from "../BaseInvoker";
import MappingFeatures from "../../../app/modules/Mapping/Features";

class MappingFeaturesInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<MappingFeatures {...this.props}/> , document.getElementById('content'));
    }
}

export default MappingFeaturesInvoker;