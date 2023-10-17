import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },

        colors: {
            'darkest_blue' : '#364151',
            'highlight_blue' : '#798593',
            'light_beige' : '#ded2cf',
            'dull_brown' : '#aca1a1',
            'highlight_dull_brown' : '#afaca8',
            'rusty_crimson' : '#6f2809',
            'somber_green' : '#474f42',
            'bleak_olive' : '#888880',
            'highlight_rusty_crimson' : '#a35858'
        }
    },

    plugins: [forms],
};
