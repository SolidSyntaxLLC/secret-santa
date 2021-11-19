const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                brand: '#8598AA',
                light: '#EFEAE6',
                laccent: '#C1A455',
                daccent: '#88657E',
                dark: '#3F485D',
                primary: '#8398ae',
                info: '#2c2b4a',
                success: '#5da86c',
                warning: '#da9834',
                danger: '#f44336',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
