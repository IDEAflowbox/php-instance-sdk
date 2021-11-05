import React from "react";
import BaseInvoker from "../BaseInvoker";
import MappingCategories from "../../../app/modules/Mapping/Categories";

class MappingCategoriesInvoker extends BaseInvoker {
    componentDidMount() {
        this.renderComponent(<MappingCategories {...this.props}/> , document.getElementById('content'));
    }
}

export default MappingCategoriesInvoker;