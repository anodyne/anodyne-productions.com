import { Fragment, useEffect, useState } from 'react'
import { useRouter } from 'next/router'
import Link from 'next/link'
import { motion } from 'framer-motion'
import { Transition } from '@headlessui/react'
import { addDays, differenceInDays, format, parse } from 'date-fns'

import { Button } from '@/components/docs/Button'
import { Footer } from '@/components/docs/Footer'
import { Header } from '@/components/docs/Header'
import { NovaLogo } from '@/components/Logos'
import { Navigation } from '@/components/docs/Navigation'
import { Prose } from '@/components/docs/Prose'
import { SectionProvider } from '@/components/docs/SectionProvider'
import { Heading } from '@/components/docs/Heading'
import { HeroPattern } from '@/components/docs/HeroPattern'
import { BookIcon } from '@/components/icons/flex/BookIcon'
import { Note } from '@/components/docs/Callout'

const importNavigationFor = version => import(`@/pages/docs/${version}/navigation`)

function PageLink({ label, page, previous = false }) {
  return (
    <>
      <Button
        href={page.href}
        aria-label={`${label}: ${page.title}`}
        variant="secondary"
        arrow={previous ? 'left' : 'right'}
      >
        {label}
      </Button>
      <Link
        href={page.href}
        tabIndex={-1}
        aria-hidden="true"
        className="text-base font-semibold text-slate-900 transition hover:text-slate-600 dark:text-white dark:hover:text-slate-300"
      >
        {page.title}
      </Link>
    </>
  )
}

function PageNavigation({ previousPage, nextPage }) {
  return (
    <div className="flex mx-auto max-w-2xl pb-8 lg:max-w-5xl">
      {previousPage && (
        <div className="flex flex-col items-start gap-3">
          <PageLink label="Previous" page={previousPage} previous />
        </div>
      )}
      {nextPage && (
        <div className="ml-auto flex flex-col items-end gap-3">
          <PageLink label="Next" page={nextPage} />
        </div>
      )}
    </div>
  )
}

export function DocsLayout({ children, title, description, isHomePage, tag, label, sections = [] }) {
    const [navigation, setNavigation] = useState([])
    const [reminderExpiration, setReminderExpiration] = useState(null)
    const [reminderDismissed, setReminderDismissed] = useState(false)

    const router = useRouter()
    const segments = router.pathname.split('/')
    const version = segments[2]

    let allLinks = navigation.flatMap((section) => section.links)
    let linkIndex = allLinks.findIndex((link) => link.href === router.pathname)
    let previousPage = allLinks[linkIndex - 1]
    let nextPage = allLinks[linkIndex + 1]

    const updateReminderExpirationFor = (version) => {
        return () => {
            let expiration = addDays(new Date(), 30)
            let expirationStr = format(expiration, 'P')

            localStorage.setItem('anodyne-docs-' + version, expirationStr)
            setReminderExpiration(expirationStr)
        }
    }

    useEffect(() => {
        document.body.classList.add('bg-white')
        document.body.classList.add('dark:bg-slate-900')
        document.body.classList.add('antialiased')

        importNavigationFor(version).then(data => setNavigation(data.navigation))

        const reminderDismissalExpiration = localStorage.getItem("anodyne-docs-" + version)

        if (reminderDismissalExpiration !== null) {
            const diffInDays = differenceInDays(
                parse(reminderDismissalExpiration, 'P', new Date()),
                new Date()
            )

            setReminderDismissed(diffInDays > 0)
        }
    }, [version, reminderExpiration])

  return (
    <SectionProvider sections={sections}>
      <div className="lg:ml-72 xl:ml-80">
        <motion.header
          layoutScroll
          className="fixed inset-y-0 left-0 z-40 contents w-72 overflow-y-auto border-r border-slate-900/10 px-6 pt-4 pb-8 dark:border-white/10 lg:block xl:w-80"
        >
          <div className="hidden lg:flex items-center space-x-6">
            <Link href="/" aria-label="Home">
              <NovaLogo className="h-8 text-slate-700 dark:text-white" />
            </Link>
          </div>
          <Header currentVersion={version} navigation={navigation} />
          <Navigation navigation={navigation} className="hidden lg:mt-10 lg:block" />
        </motion.header>
        <div className="relative px-4 pt-14 sm:px-6 lg:px-8">
          <main className="py-16">
            {isHomePage && (
              <HeroPattern />
            )}

            <header className='mb-16 prose dark:prose-invert'>
              <Heading level={1} tag={tag} label={label}>{title}</Heading>

              {description && (
                <p className='lead'>{description}</p>
              )}
            </header>

            <Prose as="article">{children}</Prose>
          </main>
          <PageNavigation previousPage={previousPage} nextPage={nextPage} />
          <Footer />
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
                                        <BookIcon className="h-7 w-7 text-sky-200 dark:text-sky-500" />
                                    </div>
                                    <div className="ml-3 w-0 flex-1">
                                        <p className="text-base font-medium text-white">You are viewing the Nova {version} docs</p>
                                        <p className="mt-1 text-sm leading-5 text-sky-100 dark:text-sky-400">If this doesn&rsquo;t match your version of Nova, you can use the dropdown in the header to change versions.</p>
                                        <div className="mt-3 flex space-x-7">
                                            <Link href={"/docs/" + version + "/resources/version-numbers#what-version-of-nova-am-i-running"} className="rounded-md bg-transparent text-sm font-medium text-white hover:text-white focus:outline-none focus:ring-2 focus:ring-sky-100 focus:ring-offset-2">
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
    </SectionProvider>
  )
}
