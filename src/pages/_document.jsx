import { Head, Html, Main, NextScript } from 'next/document'

const themeScript = `
    let mediaQuery = window.matchMedia('(prefers-color-scheme: dark)')

    function updateTheme(savedTheme) {
        let theme = 'system'

        try {
            if (!savedTheme) {
                savedTheme = window.localStorage.theme
            }

            if (savedTheme === 'dark') {
                theme = 'dark'
                document.documentElement.classList.add('dark')
            } else if (savedTheme === 'light') {
                theme = 'light'
                document.documentElement.classList.remove('dark')
            } else if (mediaQuery.matches) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        } catch {
            theme = 'light'
            document.documentElement.classList.remove('dark')
        }

        return theme
    }

    function updateThemeWithoutTransitions(savedTheme) {
        updateTheme(savedTheme)
        document.documentElement.classList.add('[&_*]:!transition-none')
        window.setTimeout(() => {
            document.documentElement.classList.remove('[&_*]:!transition-none')
        }, 0)
    }

    document.documentElement.setAttribute('data-theme', updateTheme())

    new MutationObserver(([{ oldValue }]) => {
        let newValue = document.documentElement.getAttribute('data-theme')

        if (newValue !== oldValue) {
            try {
                window.localStorage.setItem('theme', newValue)
            } catch {}

            updateThemeWithoutTransitions(newValue)
        }
    }).observe(document.documentElement, { attributeFilter: ['data-theme'], attributeOldValue: true })

    mediaQuery.addEventListener('change', updateThemeWithoutTransitions)
    window.addEventListener('storage', updateThemeWithoutTransitions)
`

export default function Document() {
    return (
        <Html lang="en">
            <Head>
                <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
                <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
                <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
                <link rel="manifest" href="/site.webmanifest" />
                <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#38bdf8" />
                <meta name="msapplication-TileColor" content="#130f32" />
                <meta name="theme-color" content="#ffffff" />

                <script dangerouslySetInnerHTML={{ __html: themeScript }} />
            </Head>
            <body>
                <Main />
                <NextScript />
            </body>
        </Html>
    )
}
