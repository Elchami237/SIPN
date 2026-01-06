import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'sipn-orange': '#F47920',
                'sipn-orange-light': '#FF9F4D',
                'sipn-orange-dark': '#D66A1A',
                'sipn-blue': '#003B7A',
                'sipn-blue-light': '#0066CC',
                'sipn-gray': '#C8C8C8',
                'sipn-gray-dark': '#333333',
            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
                heading: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
