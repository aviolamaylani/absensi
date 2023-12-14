import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, require("daisyui")],
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#5686bc",

                    secondary: "#ba7910",

                    accent: "#63a803",

                    neutral: "#2f2130",

                    "base-100": "#fafafa",

                    info: "#3bc9ed",

                    success: "#208d60",

                    warning: "#e4c111",

                    error: "#e35985",
                },
            },
        ],
    },
};
