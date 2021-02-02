const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            black: '#000',
            white: '#fff',

            amber: {
                ...colors.amber,
                ...{ 500: '#f99c26' }
            },
            gray: colors.coolGray,
            orange: {
                50: '#fef7f6',
                100: '#feefed',
                200: '#fcd8d2',
                300: '#fac1b7',
                400: '#f69282',
                500: '#f2634c',
                600: '#da5944',
                700: '#b64a39',
                800: '#913b2e',
                900: '#773125'
            },
            green: {
                50: '#f3fbfa',
                100: '#e6f8f4',
                200: '#c1ede4',
                300: '#9be1d4',
                400: '#50cbb4',
                500: '#05b594',
                600: '#05a385',
                700: '#04886f',
                800: '#036d59',
                900: '#025949'
            },
            red: {
                50: '#fbf4f5',
                100: '#f8e9eb',
                200: '#edc7cc',
                300: '#e1a5ae',
                400: '#cb6271',
                500: '#b51f34',
                600: '#a31c2f',
                700: '#881727',
                800: '#6d131f',
                900: '#590f19'
            },
            blue: {
                50: '#f5f8fc',
                100: '#ecf1f8',
                200: '#cfddee',
                300: '#b1c9e4',
                400: '#77a0d0',
                500: '#3d77bc',
                600: '#376ba9',
                700: '#2e598d',
                800: '#254771',
                900: '#1e3a5c'
            },
            'spanish-roast': '#130f32'
        },
        extend: {
            boxShadow: {
                link: 'inset 0 -0.125em 0 0 #fff, inset 0 -0.375em 0 0 rgba(165, 243, 252, 0.4)',
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        maxWidth: 'none',
                        color: theme('colors.gray.500'),
                        '> :first-child': { marginTop: '-' },
                        '> :last-child': { marginBottom: '-' },
                        '&:first-child > :first-child': {
                            marginTop: '0',
                        },
                        '&:last-child > :last-child': {
                            marginBottom: '0',
                        },
                        'h1, h2': {
                            letterSpacing: '-0.025em'
                        },
                        'h1, h2, h3, h4': {
                            color: theme('colors.spanish-roast')
                        },
                        'h2, h3': {
                            'scroll-margin-block': `${(70 + 40) / 16}rem`,
                        },
                        'h1 + p': {
                            fontSize: theme('fontSize.2xl')[0],
                            marginTop: '.5rem'
                        },
                        'ul > li': {
                            paddingLeft: '1.5em',
                        },
                        'ul > li::before': {
                            width: '0.75em',
                            height: '0.125em',
                            top: 'calc(0.875em - 0.0625em)',
                            left: 0,
                            borderRadius: 0,
                            backgroundColor: theme('colors.gray.300'),
                        },
                        'a code': {
                            color: 'inherit',
                            fontWeight: 'inherit',
                        },
                        strong: {
                            color: theme('colors.gray.900'),
                            fontWeight: theme('fontWeight.medium'),
                        },
                        'a strong': {
                            color: 'inherit',
                            fontWeight: 'inherit',
                        },
                        code: {
                            fontWeight: '400',
                            color: theme('colors.amber.600'),
                        },
                        'code::before': {
                            // content: 'none',
                        },
                        'code::after': {
                            // content: 'none',
                        },
                        table: {
                            fontSize: theme('fontSize.sm')[0],
                            lineHeight: theme('fontSize.sm')[1].lineHeight,
                        },
                        thead: {
                            color: theme('colors.gray.600'),
                            borderBottomColor: theme('colors.gray.200'),
                        },
                        'thead th': {
                            paddingTop: 0,
                            fontWeight: theme('fontWeight.semibold'),
                        },
                        'tbody tr': {
                            borderBottomColor: theme('colors.gray.200'),
                        },
                        'tbody tr:last-child': {
                            borderBottomWidth: '1px',
                        },
                        'tbody code': {
                            fontSize: theme('fontSize.xs')[0],
                        },
                    },
                },
                lg: {
                    css: {
                        'h1': {
                            marginBottom: 0
                        }
                    }
                }
            }),
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans]
            },
            spacing: {
                18: '4.5rem',
                88: '22rem',
                '15px': '0.9375rem',
                '23px': '1.4375rem',
                full: '100%'
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['odd', 'even', 'active'],
            borderWidth: ['first', 'last', 'hover', 'focus'],
            cursor: ['active'],
            opacity: ['disabled'],
            textColor: ['group-focus', 'group-hover'],
            ringWidth: ['hover', 'group-hover'],
            ringOffsetWidth: ['hover', 'group-hover'],
            ringOffsetColor: ['hover', 'group-hover'],
            ringColor: ['hover', 'group-hover'],
            ringOpacity: ['hover', 'group-hover'],
            rotate: ['first', 'last', 'odd', 'even'],
        },
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
