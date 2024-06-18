import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// https://tailwindcss.com/docs/theme <- how to customize this
// https://huemint.com/bootstrap-plus/ <- palette builder
// https://html-color.codes
import colors from 'tailwindcss/colors' // needed if you want to alias colors

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        // Modular resources
        './app-modules/**/resources/views/**/*.blade.php',

        // May assign classes as strings in the component
        './app-modules/**/src/Livewire/*.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                light: '#ebdfd4',
                dark: '#000036',

                primary: '#f400a1',  // hollywood cerise
                secondary: '#317873', // myrtle green
                info: '#1d86e6',

                success: '#00b66b',
                warning: '#ff7800',
                danger: '#f11104',

                swap: '#be4472',

                // light: '#ebdfd4',
                // dark: '#130837',
                // primary: '#8f0003',
                // secondary: '#524a4f',
                // info: '#c1cde0',
                // success: '#00b66b',
                // warning: '#ffbc5f',
                // danger: '#ee2804',

                lightDark: '#4b1333',
                darkDark: '#241f31',
                primaryDark: '#ff1493',
                secondaryDark: '#c0c0c0',
                infoDark: '#62a0ea',
                successDark: '#00a43d',
                warningDark: '#efc600',
                dangerDark: '#f30039',
            }
        },
    },
    darkMode: 'selector',
    plugins: [forms],
};
