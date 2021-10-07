import axios from 'axios';

class Instance {
    constructor() {
        const token = localStorage.getItem('access_token');

        if (token) {
            this.setAccessToken(JSON.parse(token));
        }

        this.axios = axios.create({
            // baseURL: process.env.REACT_APP_API_SERVER_URL,
            // headers: this.getHeaders(),
            // withCredentials: true
            headers: {
                accept: 'application/json',
            },
            params: {
                xhr: true
            }
        });
        this.token = undefined;
        this.isTokenFresh = false;
        this.attemptsCursor = 0;
    }

    /**
     * Check if access token exists.
     */
    hasAccessToken()
    {
        return !!localStorage.getItem('access_token');
    }

    /**
     * Set Access Token.
     * @param token
     */
    setAccessToken(token)
    {
        this.token = token;
        localStorage.setItem('access_token', JSON.stringify(token));
    }

    /**
     * Remove access token.
     * @param redirect
     */
    removeAccessToken(redirect = '/login')
    {
        localStorage.removeItem('access_token');
        if (redirect) {
            window.location = redirect;
        }
    }

    /**
     * Prepare headers bag.
     */
    getHeaders() {
        let headers = {
            'Accept-Language': 'en',
        };

        if(this.token) {
            headers = Object.assign(headers, {
                'Authorization': `Bearer ${this.token.access_token}`,
            });
        }

        return headers;
    }

    /**
     * Get Access Token.
     * @param credentials
     */
    getToken(credentials) {
        this.isTokenFresh = false;
        return new Promise((resolve, reject) => {
            this.axios
                .post('/oauth/v2/token', {
                    'client_id': process.env.REACT_APP_API_CLIENT_ID,
                    'client_secret': process.env.REACT_APP_API_SECRET,
                    'grant_type': 'refresh_token',
                    'refresh_token': credentials.refresh_token
                })
                .then((response) => {
                    this.isTokenFresh = true;
                    this.setAccessToken(response.data)
                    resolve(response.data);
                })
                .catch((error) => {
                    if(this.hasAccessToken() && error.response.data.error_description === "Invalid refresh token") {
                        this.removeAccessToken();
                    }

                    reject(error);
                });
        })
    }

    /**
     * Get Refresh Token.
     * @param maxAttempts
     */
    getRefreshToken(maxAttempts = 3) {
        return new Promise((resolve, reject) => {
            this.attemptsCursor++;

            if (!this.isTokenFresh && this.attemptsCursor <= maxAttempts) {
                // Set throttling for one second
                setTimeout(() => resolve(this.getRefreshToken(maxAttempts)), 1000);
            } else if(this.isTokenFresh && this.attemptsCursor === 1 && this.token) {
                this
                    .getToken({
                        'grant_type': 'refresh_token',
                        'refresh_token': this.token.refresh_token
                    })
                    .then((token) => resolve(token));
            } else if (this.isTokenFresh && this.attemptsCursor > 1 && this.token) {
                resolve(this.token);
            }else {
                reject('Cannot receive token.');
            }
        });
    }

    /**
     * Get Axios instance.
     */
    getAxios() {
        // this.instance.interceptors.response.use((response: AxiosResponse<any>) => {
        //     return response;
        // });

        // this.axios.interceptors.response.use(response => response, (error: AxiosError) => {
        //     const status = error.response ? error.response.status : null
        //
        //     if (status === 401) {
        //         return this
        //             .getRefreshToken()
        //             .then((token: AccessToken) => {
        //                 this.axios.defaults.headers.common['Authorization'] = `Bearer ${token.access_token}`;
        //                 originalRequest.headers['Authorization'] = `Bearer ${token.access_token}`;
        //                 return this.axios(originalRequest);
        //             });
        //
        //     }
        //
        //     return Promise.reject(error);
        // });


        this.axios.interceptors.response.use(
            (response) => response,
            (error) => {
                const originalRequest = error.config;
                const response = error.response;

                if (response && response.status === 401 && !originalRequest._retry && this.hasAccessToken()) {
                    originalRequest._retry = true;

                    return this.getRefreshToken().then((token) => {
                        this.axios.defaults.headers.common['Authorization'] = `Bearer ${token.access_token}`;
                        originalRequest.headers['Authorization'] = `Bearer ${token.access_token}`;
                        return this.axios(originalRequest);
                    });
                } else {
                    // if(localStorage.getItem('auth_credentials')) {
                    //     localStorage.removeItem('auth_credentials');
                    //     (window as any).location = '/login';
                    // }
                }

                return Promise.reject(error);
            }
        );

        return this.axios;
    }
}

const instance = new Instance();
export default instance.getAxios();
