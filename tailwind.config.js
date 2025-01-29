/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Raleway", ...defaultTheme.fontFamily.sans],
                mono: ["Source Code Pro", ...defaultTheme.fontFamily.mono],
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
