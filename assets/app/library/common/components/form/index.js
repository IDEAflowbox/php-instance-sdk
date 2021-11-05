import React from 'react';

const Form = (props) => (
    <form className="ant-form ant-form-vertical login-form" {...props}>
        {props.children}
    </form>
);

export default Form;