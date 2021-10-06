export function useQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);

    const setParam = (value) => {
        urlParams.set(param, value);
        window.history.replaceState(null, null, "?"+urlParams.toString());
    }

    const deleteParam = () => {
        urlParams.delete(param);
        window.history.replaceState(null, null, "?"+urlParams.toString());
    }

    return [urlParams.get(param), setParam, deleteParam];
}
