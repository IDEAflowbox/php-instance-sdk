import { AxiosError } from "axios";
export declare function handleAccessDeniedError(response: AxiosError, fallback: (response: AxiosError<any>) => string): any;
