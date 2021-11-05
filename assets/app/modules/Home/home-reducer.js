const initialState = {
    isTest: false,
}

export function authorization(state = initialState, action) {
    if (action.type === "TEST") {
        return {
            isTest: true
        };
    }
    return state;
}