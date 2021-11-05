export function handleAccessDeniedError(response, fallback) {
    const errorResponse = response.response;
    if(errorResponse && errorResponse.data && errorResponse.data.error === 'access_denied') {
        return errorResponse.data.error_description;
    }

    return fallback(response);
}