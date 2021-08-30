module.exports = {
    plugins: [
        require('autoprefixer'),
        require("postcss-easy-import")({ prefix: "_" }),
        require("postcss-import"),
        require("tailwindcss")('./tailwind.config.js')
    ]
};
