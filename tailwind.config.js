import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mainBg: '#FFF',
                secondBg: 'rgb(224, 224, 224)',
                
                textMuted: 'rgb(121, 120, 123)',
                textColor: '#000',

                colorPrimary: "#F2A340",
                colorSecondary: "#C28008",

                colorHover: "rgba(194, 128, 8, 0.15)",
            },
        },
    },

    plugins: [forms],
};
