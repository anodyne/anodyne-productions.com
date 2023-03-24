const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
const { default: flattenColorPalette } = require('tailwindcss/lib/util/flattenColorPalette');

module.exports = {
  content: [
    './resources/**/*.{js,blade.php,css}',
    './resources/svg/flex-duo/*.svg',
    './vendor/filament/**/*.blade.php',
    './app/CommonMark/Extensions/Tag/Renderers/*.php',
    './app/View/Components/*.php',
    './app/Filament/Resources/**/*.php',
    './vendor/livewire-ui/modal/resources/views/*.blade.php',
    './vendor/wire-elements/pro/config/wire-elements-pro.php',
    './vendor/wire-elements/pro/**/*.blade.php',
    './storage/framework/views/*.php',
    './safelist.txt',
  ],
  darkMode: 'class',
  theme: {
    fontSize: {
      '2xs': ['0.75rem', { lineHeight: '1.25rem' }],
      xs: ['0.8125rem', { lineHeight: '1.5rem' }],
      sm: ['0.875rem', { lineHeight: '1.5rem' }],
      base: ['1rem', { lineHeight: '1.75rem' }],
      lg: ['1.125rem', { lineHeight: '1.75rem' }],
      xl: ['1.25rem', { lineHeight: '1.75rem' }],
      '2xl': ['1.5rem', { lineHeight: '2rem' }],
      '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
      '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
      '5xl': ['3rem', { lineHeight: '1' }],
      '6xl': ['3.75rem', { lineHeight: '1' }],
      '7xl': ['4.5rem', { lineHeight: '1' }],
      '8xl': ['6rem', { lineHeight: '1' }],
      '9xl': ['8rem', { lineHeight: '1' }],
    },
    typography: require('./typography'),
    extend: {
      borderRadius: {
        '4xl': '2rem',
      },
      boxShadow: {
        glow: '0 0 4px rgb(0 0 0 / 0.1)',
        input: `
          0px 1px 0px -1px var(--tw-shadow-color),
          0px 1px 1px -1px var(--tw-shadow-color),
          0px 1px 2px -1px var(--tw-shadow-color),
          0px 2px 4px -2px var(--tw-shadow-color),
          0px 3px 6px -3px var(--tw-shadow-color)
        `,
        button: `
          inset 0px 1px 0px 0px #fff,
          0px 0px 0px 1px rgba(0,0,0,.08),
          0px 1px 0px 0px rgba(0,0,0,.06),
          0px 2px 2px 0px rgba(0,0,0,.04),
          0px 3px 3px 0px rgba(0,0,0,.02),
          0px 4px 4px 0px rgba(0,0,0,.01)
        `,
        'button-dark': `
          0px 1px 1px -1px rgba(0,0,0,.08),
          0px 2px 2px -1px rgba(0,0,0,.08),
          0px 0px 0px 1px rgba(0,0,0,.06),
          inset 0px 1px 0px rgba(255,255,255,.1),
          inset 0px 1px 2px 1px rgba(255,255,255,.1),
          inset 0px 1px 2px rgba(0,0,0,.06),
          inset 0px -4px 8px -4px rgba(0,0,0,.04)
        `,
        'button-purple': `
          inset 0px 1px 0px 0px #fff,
          0px 0px 0px 1px rgba(168,85,247,.22),
          0px 1px 0px 0px rgba(168,85,247,.45),
          0px 2px 2px 0px rgba(168,85,247,.1),
          0px 3px 3px 0px rgba(168,85,247,.06),
          0px 4px 4px 0px rgba(168,85,247,.04)
        `,
        highlight: `
          inset 0px 0px 0px 1px var(--tw-shadow-color),
          inset 0px 1px 0px var(--tw-shadow-color)
        `,
      },
      fontFamily: {
        sans: ['"Inter var"', ...defaultTheme.fontFamily.sans],
        display: ['"Lexend"', ...defaultTheme.fontFamily.sans]
      },
      lineHeight: {
        0: 0,
      },
      colors: {
        transparent: 'transparent',

        white: '#fff',
        black: '#000',

        primary: colors.sky,
        danger: colors.rose,
        success: colors.emerald,
        warning: colors.amber,
      },
      maxWidth: {
        lg: '33rem',
        '2xl': '40rem',
        '3xl': '50rem',
        '5xl': '66rem',
        '8xl': '90rem',
      },
      opacity: {
        1: '0.01',
        2.5: '0.025',
        7.5: '0.075',
        15: '0.15',
      },
    },
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    function ({ matchUtilities, theme }) {
      matchUtilities(
        {
          highlight: (value) => ({ boxShadow: `inset 0 1px 0 0 ${value}` }),
        },
        { values: flattenColorPalette(theme('backgroundColor')), type: 'color' }
      )
    },
  ],
};
