const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            colors: {
                blue: {
                    50: '#F0F8FD',
                    100: '#E6F3FA',
                    200: '#C0E1F4',
                    300: '#9ACFED',
                    400: '#4EACDF',
                    500: '#0288D1',
                    600: '#027ABC',
                    700: '#01649B',
                    800: '#01527D',
                    900: '#013D5E'
                }
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans]
            }
        }
    },
    variants: {
        backgroundColor: ['responsive', 'group-hover', 'hover', 'group-focus', 'focus-within', 'focus', 'active', 'even', 'odd'],
        borderColor: ['responsive', 'group-hover', 'hover', 'group-focus', 'focus-within', 'focus'],
        borderRadius: ['responsive', 'hover', 'focus', 'first', 'last'],
        borderWidth: ['responsive', 'first', 'last'],
        boxShadow: ['responsive', 'hover', 'focus', 'focus-within'],
        cursor: ['hover', 'group-hover', 'focus', 'focus-within', 'disabled'],
        margin: ['responsive', 'hover', 'focus', 'first', 'last'],
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        textColor: ['responsive', 'group-hover', 'hover', 'group-focus', 'focus-within', 'focus', 'active']
    },
    plugins: [
        require('@tailwindcss/ui')
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
