export interface User {
    email: string;
}
export interface Subscription {
    is_active: boolean;
    is_trial: boolean;
    status?: string;
    name?: string;
    interval?: string;
    product_id?: string;
    trial_start?: number;
    trial_end?: number;
    current_period_start?: number;
    current_period_end?: number;
    cancel_at?: number;
    timestamp: number;
}
export interface AppState {
    initialized: boolean;
    user?: User;
    subscription?: Subscription;
}
