/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.blade.php", "./src/**/*.php"],
    darkMode: "class",
    theme: {
        extend: {},
    },
    corePlugins: {
        preflight: false,
    },
    plugins: [require("@tailwindcss/typography")],
};
