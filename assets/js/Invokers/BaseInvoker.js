import React from "react";
import ReactDOM from "react-dom";
import {AppContext} from "../../app/library/common/providers/app/context";

class BaseInvoker extends React.PureComponent {
    renderComponent(element, container) {
        ReactDOM.render(<AppContext.Provider value={this.props['_globals']}>{element}</AppContext.Provider>, container);
    }

    render() {
        return null;
    }
}

export default BaseInvoker;