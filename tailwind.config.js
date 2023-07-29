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

                colorPrimary: "rgb(2, 102, 255)",
                colorSecondary: "#3949AB",

                colorHover: "rgba(31,41,55, .2)",
            },
        },
    },

    plugins: [forms],
};
