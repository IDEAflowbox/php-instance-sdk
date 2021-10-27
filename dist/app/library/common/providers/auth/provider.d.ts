import React from 'react';
import { AuthState } from "./types";
export declare class AuthProvider extends React.Component<any, AuthState> {
    constructor(props: any);
    private logout;
    private login;
    componentDidMount(): void;
    render(): JSX.Element;
}
