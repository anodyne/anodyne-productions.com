const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',

            black: '#000',
            white: '#fff',

            amber: colors.amber,
            blue: colors.blue,
            cyan: colors.cyan,
            emerald: colors.emerald,
            fuchsia: colors.fuchsia,
            gray: colors.coolGray,
            green: colors.green,
            indigo: colors.indigo,
            'light-blue': colors.lightBlue,
            lime: colors.lime,
            orange: colors.orange,
            pink: colors.pink,
            purple: colors.purple,
            red: colors.red,
            rose: colors.rose,
            teal: colors.teal,
            violet: colors.violet,
            yellow: colors.yellow
        },
        extend: {
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
                            letterSpacing: '-0.025em',
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
                            color: theme('colors.purple.600'),
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
            ringWidth: ['focus-visible'],
            ringOffsetWidth: ['focus-visible'],
            ringOffsetColor: ['focus-visible'],
            ringColor: ['focus-visible'],
            ringOpacity: ['focus-visible'],
            rotate: ['first', 'last', 'odd', 'even'],
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
