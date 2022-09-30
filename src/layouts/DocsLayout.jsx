import React, { Fragment, useCallback, useEffect, useState } from 'react'
import { useRouter } from 'next/router'
import Link from 'next/link'
import clsx from 'clsx'
import { Hero2 } from '@/components/docs/Hero2'
import { Hero3 } from '@/components/docs/Hero3'
import { Navigation } from '@/components/Navigation'
import { Prose } from '@/components/Prose'
import { Header } from '@/components/docs/Header'
import { BookIcon } from '@/components/icons/flex/BookIcon'
import { Transition } from '@headlessui/react'

const importNavigationFor = version => import(`@/pages/docs/${version}/navigation`)

function useTableOfContents(tableOfContents) {
    let [currentSection, setCurrentSection] = useState(tableOfContents[0]?.id)

    let getHeadings = useCallback((tableOfContents) => {
        return tableOfContents
            .flatMap((node) => [node.id, ...node.children.map((child) => child.id)])
            .map((id) => {
                let el = document.getElementById(id)
                if (!el) return

                let style = window.getComputedStyle(el)
                let scrollMt = parseFloat(style.scrollMarginTop)

                let top = window.scrollY + el.getBoundingClientRect().top - scrollMt
                return { id, top }
            })
    }, [])

    useEffect(() => {
        if (tableOfContents.length === 0) return

        let headings = getHeadings(tableOfContents)

        function onScroll() {
            let top = window.scrollY
            let current = headings[0].id

            for (let heading of headings) {
                if (top >= heading.top) {
                    current = heading.id
                } else {
                    break
                }
            }

            setCurrentSection(current)
        }

        window.addEventListener('scroll', onScroll, { passive: true })

        onScroll()

        return () => {
            window.removeEventListener('scroll', onScroll, { passive: true })
        }
    }, [getHeadings, tableOfContents])

    return currentSection
}

export function DocsLayout({ children, title, tableOfContents }) {
    const [navigation, setNavigation] = useState([])
    const [reminderExpiration, setReminderExpiration] = useState(null)
    const [reminderDismissed, setReminderDismissed] = useState(false)

    const router = useRouter()
    const segments = router.pathname.split('/')
    const version = segments[2]

    let isHomePage = children.props.markdoc.frontmatter.homePage || false
    let isNova2 = version.includes('2.')
    let isNova3 = version.includes('3.')
    let allLinks = navigation.flatMap((section) => section.links)
    let linkIndex = allLinks.findIndex((link) => link.href === router.pathname)
    let previousPage = allLinks[linkIndex - 1]
    let nextPage = allLinks[linkIndex + 1]
    let section = navigation.find((section) =>
        section.links.find((link) => link.href === router.pathname)
    )
    let currentSection = useTableOfContents(tableOfContents)

    function isActive(section) {
        if (section.id === currentSection) {
            return true
        }

        if (!section.children) {
            return false
        }

        return section.children.findIndex(isActive) > -1
    }

    const updateReminderExpirationFor = (version) => {
        return () => {
            let expiration = new Date()
            expiration.setDate(expiration.getDate() + 30)

            localStorage.setItem('anodyne-docs-' + version, expiration)
            setReminderExpiration(expiration)
        }
    }

    useEffect(() => {
        document.documentElement.classList.add('antialiased')
        document.body.classList.add('bg-white')
        document.body.classList.add('dark:bg-slate-900')
        document.body.classList.remove('bg-slate-50')

        importNavigationFor(version).then(data => setNavigation(data.navigation))

        const reminderDismissalExpiration = localStorage.getItem("anodyne-docs-" + version)

        if (reminderDismissalExpiration !== null) {
            const now = new Date()
            const expiration = new Date(reminderDismissalExpiration)

            const nowUTC = Date.UTC(now.getFullYear(), now.getMonth(), now.getDay())
            const expirationUTC = Date.UTC(expiration.getFullYear(), expiration.getMonth(), expiration.getDay())
            const diffInDays = Math.floor((expirationUTC - nowUTC) / 1000 * 60 * 60 * 24)

            setReminderDismissed(diffInDays > 0)
        }
    }, [version, reminderExpiration])

    return (
        <>
            <Header navigation={navigation} currentVersion={version} />

            {(isHomePage && isNova2) && <Hero2 />}

            {(isHomePage && isNova3) && <Hero3 />}

            <div className="relative mx-auto flex max-w-8xl justify-center sm:px-2 lg:px-8 xl:px-12">
                <div className="hidden lg:relative lg:block lg:flex-none">
                    <div className="absolute inset-y-0 right-0 w-[50vw] bg-slate-50 dark:hidden" />
                    <div className="sticky top-[4.5rem] -ml-0.5 h-[calc(100vh-4.5rem)] overflow-y-auto py-16 pl-0.5">
                        <div className="absolute top-16 bottom-0 right-0 hidden h-12 w-px bg-gradient-to-t from-slate-800 dark:block" />
                        <div className="absolute top-28 bottom-0 right-0 hidden w-px bg-slate-800 dark:block" />
                        <Navigation navigation={navigation} className="w-64 pr-8 xl:w-72 xl:pr-16" />
                    </div>
                </div>

                <div className="min-w-0 max-w-2xl flex-auto px-4 py-16 lg:max-w-none lg:pr-0 lg:pl-8 xl:px-16">
                    <article>
                        {(title || section) && (
                            <header className="mb-9 space-y-1">
                                {section && (
                                    <p className="font-display text-sm font-medium text-sky-500">
                                        {section.title}
                                    </p>
                                )}

                                {title && (
                                    <h1 className="font-display text-3xl tracking-tight text-slate-900 dark:text-white">
                                        {title}
                                    </h1>
                                )}
                            </header>
                        )}

                        <Prose>{children}</Prose>
                    </article>

                    <dl className="mt-12 flex border-t border-slate-200 pt-6 dark:border-slate-800">
                        {previousPage && (
                            <div>
                                <dt className="font-display text-sm font-medium text-slate-900 dark:text-white">
                                    Previous
                                </dt>
                                <dd className="mt-1">
                                    <Link
                                        href={previousPage.href}
                                        className="text-base font-semibold text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300 space-x-1"
                                    >
                                        <span aria-hidden="true">&larr;</span>
                                        <span>{previousPage.title}</span>
                                    </Link>
                                </dd>
                            </div>
                        )}

                        {nextPage && (
                            <div className="ml-auto text-right">
                                <dt className="font-display text-sm font-medium text-slate-900 dark:text-white">
                                    Next
                                </dt>
                                <dd className="mt-1">
                                    <Link
                                        href={nextPage.href}
                                        className="inline-flex items-center text-base font-semibold text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300 space-x-1"
                                    >
                                        <span>{nextPage.title}</span>
                                        <span aria-hidden="true">&rarr;</span>
                                    </Link>
                                </dd>
                            </div>
                        )}
                    </dl>
                </div>

                <div className="hidden xl:sticky xl:top-[4.5rem] xl:-mr-6 xl:block xl:h-[calc(100vh-4.5rem)] xl:flex-none xl:overflow-y-auto xl:py-16 xl:pr-6">
                    <nav aria-labelledby="on-this-page-title" className="w-56">
                        {tableOfContents.length > 0 && (
                            <>
                                <h2
                                    id="on-this-page-title"
                                    className="font-display text-sm font-medium text-slate-900 dark:text-white"
                                >
                                    On this page
                                </h2>

                                <ol role="list" className="mt-4 space-y-3 text-sm">
                                    {tableOfContents.map((section) => (
                                        <li key={section.id}>
                                            <h3>
                                                <Link
                                                    href={`#${section.id}`}
                                                    className={clsx(
                                                        isActive(section)
                                                            ? 'text-sky-500'
                                                            : 'font-normal text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-300'
                                                    )}
                                                >
                                                    {section.title}
                                                </Link>
                                            </h3>

                                            {section.children.length > 0 && (
                                                <ol
                                                    role="list"
                                                    className="mt-2 space-y-3 pl-5 text-slate-500 dark:text-slate-400"
                                                >
                                                    {section.children.map((subSection) => (
                                                        <li key={subSection.id}>
                                                            <Link
                                                                href={`#${subSection.id}`}
                                                                className={
                                                                    isActive(subSection)
                                                                        ? 'text-sky-500'
                                                                        : 'hover:text-slate-600 dark:hover:text-slate-300'
                                                                }
                                                            >
                                                                {subSection.title}
                                                            </Link>
                                                        </li>
                                                    ))}
                                                </ol>
                                            )}
                                        </li>
                                    ))}
                                </ol>
                            </>
                        )}
                    </nav>
                </div>
            </div>

            <div aria-live="assertive" className="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:p-6 sm:items-end">
                <div className="flex w-full flex-col items-center space-y-4 sm:items-end">
                    <Transition
                        as={Fragment}
                        show={!reminderDismissed}
                        enter="transform ease-out duration-300 transition"
                        enterFrom="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                        enterTo="translate-y-0 opacity-100 sm:translate-x-0"
                        leave="transition ease-in duration-100"
                        leaveFrom="opacity-100"
                        leaveTo="opacity-0"
                    >
                        <div className="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-sky-500 dark:bg-sky-900 shadow-lg dark:highlight-white/10 shadow-sky-800/50 ring-1 ring-black ring-opacity-5">
                            <div className="p-4">
                                <div className="flex items-start">
                                    <div className="flex-shrink-0">
                                        <BookIcon className="h-7 w-7 text-sky-300 dark:text-sky-500" />
                                    </div>
                                    <div className="ml-3 w-0 flex-1">
                                        <p className="text-sm font-medium text-white">You are viewing the Nova {version} docs</p>
                                        <p className="mt-1 text-sm text-sky-200 dark:text-sky-400">If this doesn&rsquo;t match your version of Nova, you can use the dropdown in the header to change versions.</p>
                                        <div className="mt-3 flex space-x-7">
                                            <Link href={"/docs/" + version + "/resources/versioning#what-version-of-nova-am-i-running"} className="rounded-md bg-transparent text-sm font-medium text-sky-100 hover:text-white focus:outline-none focus:ring-2 focus:ring-sky-100 focus:ring-offset-2">
                                                <span>What version of Nova do I have?</span>
                                                <span className="ml-1.5">&rarr;</span>
                                            </Link>
                                        </div>
                                    </div>
                                    <div className="ml-4 flex flex-shrink-0">
                                        <button
                                            type="button"
                                            onClick={updateReminderExpirationFor(version)}
                                            className="inline-flex rounded-md text-sky-300 dark:text-sky-600 hover:text-sky-200 dark:hover:text-sky-500 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                        >
                                            <span className="sr-only">Close</span>
                                            <svg className="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" /></svg>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </Transition>
                </div>
            </div>
        </>
    )
}
