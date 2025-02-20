const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#9c1661",
                secondary: colors.white,
                tertiary: colors.black,
                text: "rgb(104, 97, 97)",
                success: {
                    light: "rgb(178, 238, 160)",
                    DEFAULT: "rgb(25, 141, 25)",
                },
                danger: {
                    light: "rgb(238, 160, 160)",
                    DEFAULT: "rgb(141, 25, 25)",
                },
                warning: {
                    light: "rgb(233, 238, 160)",
                    DEFAULT: "rgb(107, 109, 20)",
                },
            },
            fontFamily: {
                sans: ["Roboto", "sans-serif"],
            },
            spacing: {
                nav: "70px",
                footer: "320px",
            },
            backgroundImage: {
                "gradient-primary":
                    "linear-gradient(135deg, rgba(82, 130, 234, 1) 0%, rgba(2, 228, 222, 1) 100%)",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};

