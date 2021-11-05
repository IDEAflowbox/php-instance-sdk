import React from "react";
import debounce from "lodash/debounce";
import {Select, Spin} from "antd";

export default function DebounceSelect({ fetchOptions, debounceTimeout = 800, defaultOptions = [], ...props }) {
    const [fetching, setFetching] = React.useState(false);
    const [options, setOptions] = React.useState(defaultOptions);
    const fetchRef = React.useRef(0);
    const debounceFetcher = React.useMemo(() => {
        const loadOptions = (value) => {
            fetchRef.current += 1;
            const fetchId = fetchRef.current;
            setOptions([]);
            setFetching(true);
            fetchOptions(value).then((newOptions) => {
                if (fetchId !== fetchRef.current) {
                    // for fetch callback order
                    return;
                }

                setOptions(newOptions);
                setFetching(false);
            });
        };

        return debounce(loadOptions, debounceTimeout);
    }, [fetchOptions, debounceTimeout]);

    return (
        <Select
            labelInValue
            filterOption={false}
            onSearch={debounceFetcher}
            notFoundContent={fetching ? <Spin size="small" /> : null}
            {...props}
            options={options}
            showSearch={true}
        />
    );
}