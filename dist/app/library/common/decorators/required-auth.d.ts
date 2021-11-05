import { ComponentType, PropsWithChildren } from 'react';
declare const requiredAuth: (Component: ComponentType<any>) => (props: PropsWithChildren<any>) => JSX.Element;
export default requiredAuth;
