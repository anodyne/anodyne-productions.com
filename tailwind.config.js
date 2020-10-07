const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [
        /* eslint-disable */
        require('@tailwindcss/ui')({
            layout: 'sidebar'
        }),
        require('@tailwindcss/typography'),
        require('tailwindcss-interaction-variants'),
        /* eslint-enable */
    ],

    experimental: {
        darkModeVariant: false,
        defaultLineHeights: true,
        extendedFontSizeScale: true,
        extendedSpacingScale: true,
        uniformColorPalette: true
    },

    future: {
        purgeLayersByDefault: true,
        removeDeprecatedGapUtilities: true
    }
};
