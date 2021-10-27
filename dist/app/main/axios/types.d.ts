import React from "react";
interface StatusInterface {
    error: boolean;
    code: number;
    type: string;
    message: any;
}
export interface DefaultResponse {
    status: StatusInterface;
}
export interface DataResponse<T> {
    status: StatusInterface;
    data: T;
}
export interface DataPaginationResponse<T> {
    status: StatusInterface;
    data: {
        rows_number: number;
        current_page: number;
        last_page: number;
        data: T[];
    };
}
export declare type OAuthErrorDataResponse = {
    error: string;
    error_description: string;
};
export declare type SuccessCallback = (payload?: any) => void;
export declare type ErrorCallback = (payload?: any) => void;
export declare type OverlayFunc = () => React.ReactNode;
export {};
