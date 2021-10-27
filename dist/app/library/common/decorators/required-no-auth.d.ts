import { ComponentType, PropsWithChildren } from 'react';
declare const requiredNoAuth: (Component: ComponentType<any>) => (props: PropsWithChildren<any>) => JSX.Element;
export default requiredNoAuth;
