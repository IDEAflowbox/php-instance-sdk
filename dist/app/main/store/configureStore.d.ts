declare const configureStore: () => import("redux").Store<import("redux").EmptyObject, import("redux").AnyAction>;
export declare const store: import("redux").Store<import("redux").EmptyObject, import("redux").AnyAction>;
export declare type RootState = ReturnType<typeof store.getState>;
export declare type AppDispatch = typeof store.dispatch;
export default configureStore;
