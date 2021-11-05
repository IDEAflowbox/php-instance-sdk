declare const toastr: {
    success: (message: string, description: string, duration?: number) => void;
    info: (message: string, description: string, duration?: number) => void;
    error: (message: string, description: string, duration?: number) => void;
    warning: (message: string, description: string, duration?: number) => void;
};
export default toastr;
