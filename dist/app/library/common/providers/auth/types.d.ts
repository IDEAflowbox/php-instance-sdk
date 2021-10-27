export interface AccessToken {
    access_token: string;
    expires_in: number;
    token_type: string;
    refresh_token: string;
}
export interface AuthState {
    logged_in: boolean;
    login: (email: string, password: string) => Promise<boolean>;
    logout: () => Promise<boolean>;
    access_token?: AccessToken;
    error?: string;
    initialized: boolean;
}
export interface RefreshTokenCredentials {
    grant_type: 'refresh_token';
    refresh_token: string;
}
export interface TokenCredentials {
    grant_type: 'password';
    username: string;
    password: string;
}
export declare type TokenRequestingCredentials = RefreshTokenCredentials | TokenCredentials;
export declare type GrantType = 'password' | 'refresh_token';
export declare type LoginProps = {};
export declare type LoginState = {};
