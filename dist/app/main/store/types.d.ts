export declare enum ActionStatusEnum {
    ERROR = -1,
    IN_PROGRESS = 0,
    SUCCESS = 1
}
export interface Action<T = any> {
    status?: ActionStatusEnum;
    error?: any;
    payload?: T;
}
