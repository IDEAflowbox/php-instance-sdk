import React from 'react';

const Show = (props) => {
    return props.condition ? props.children : null;
}

Show.defaultProps = {
    condition: false,
}

export default Show;