module.exports = {
    plugins: [
        require("postcss-easy-import")({ prefix: "_" }),
        require("postcss-import"),
        require("tailwindcss")('./tailwind.config.js'),
        require('autoprefixer'),
    ]
};