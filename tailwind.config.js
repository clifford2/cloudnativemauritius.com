/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        screens: {
            ...defaultTheme.screens, // included to make min-[]/max-[] (arbitrary breakpoints) work
        },
        extend: {
            colors: {
                accent: "#D62293",
                background: "#93EAFF",
                primary: "#0086FF",
            },

            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
                mono: ["Source Code Pro", ...defaultTheme.fontFamily.mono],
            },

            animation: {
                shine: "shine 0.7s cubic-bezier(0.4, 0, 0.5, 1)",
            },
            keyframes: {
                shine: {
                    from: { left: "110%" },
                    to: { left: "-90%" },
                },
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
