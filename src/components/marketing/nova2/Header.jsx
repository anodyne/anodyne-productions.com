import { Fragment } from 'react'
import Link from 'next/link'
import { Popover, Transition } from '@headlessui/react'
import clsx from 'clsx'
import { Container } from '@/components/marketing/Container'
import { NovaLogo } from '@/components/Logos'
import { NavLink } from '@/components/marketing/NavLink'
import { StarIcon } from '@/components/icons/flex/StarIcon'
import { DownloadIcon } from '@/components/icons/flex/DownloadIcon'
import { BookIcon } from '@/components/icons/flex/BookIcon'
import { ArchiveIcon } from '@/components/icons/flex/ArchiveIcon'
import { SupportIcon } from '@/components/icons/flex/SupportIcon'
import { LoginIcon } from '@/components/icons/flex/LoginIcon'

function MobileNavLink({ href, children }) {
    return (
        <Popover.Button
            as={Link}
            href={href}
            className="flex items-center space-x-3 w-full p-2 font-medium"
        >
            {children}
        </Popover.Button>
    )
}

function MobileNavIcon({ open }) {
    return (
        <svg
            aria-hidden="true"
            className="h-3.5 w-3.5 overflow-visible stroke-slate-700"
            fill="none"
            strokeWidth={2}
            strokeLinecap="round"
        >
            <path
                d="M0 1H14M0 7H14M0 13H14"
                className={clsx(
                    'origin-center transition',
                    open && 'scale-90 opacity-0'
                )}
            />
            <path
                d="M2 2L12 12M12 2L2 12"
                className={clsx(
                    'origin-center transition',
                    !open && 'scale-90 opacity-0'
                )}
            />
        </svg>
    )
}

function MobileNavigation() {
    return (
        <Popover>
            <Popover.Button
                className="relative z-10 flex h-8 w-8 items-center justify-center [&:not(:focus-visible)]:focus:outline-none"
                aria-label="Toggle Navigation"
            >
                {({ open }) => <MobileNavIcon open={open} />}
            </Popover.Button>

            <Transition.Root>
                <Transition.Child
                    as={Fragment}
                    enter="duration-150 ease-out"
                    enterFrom="opacity-0"
                    enterTo="opacity-100"
                    leave="duration-150 ease-in"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                >
                    <Popover.Overlay className="fixed inset-0 bg-slate-300/50" />
                </Transition.Child>

                <Transition.Child
                    as={Fragment}
                    enter="duration-150 ease-out"
                    enterFrom="opacity-0 scale-95"
                    enterTo="opacity-100 scale-100"
                    leave="duration-100 ease-in"
                    leaveFrom="opacity-100 scale-100"
                    leaveTo="opacity-0 scale-95"
                >
                    <Popover.Panel
                        as="div"
                        className="absolute inset-x-0 top-full mt-4 flex origin-top flex-col rounded-2xl bg-white p-4 text-lg tracking-tight text-slate-900 shadow-xl ring-1 ring-slate-900/5"
                    >
                        <MobileNavLink href="#features">
                            <StarIcon className="h-6 w-6 text-slate-500" />
                            <span>Features</span>
                        </MobileNavLink>
                        <MobileNavLink href="#download">
                            <DownloadIcon className="h-6 w-6 text-slate-500" />
                            <span>Download</span>
                        </MobileNavLink>
                        <MobileNavLink href="/docs/2.6/introduction">
                            <BookIcon className="h-6 w-6 text-slate-500" />
                            <span>Docs</span>
                        </MobileNavLink>
                        <MobileNavLink href="#resources">
                            <ArchiveIcon className="h-6 w-6 text-slate-500" />
                            <span>Resources</span>
                        </MobileNavLink>
                        <MobileNavLink href="https://discord.gg/7WmKUks">
                            <SupportIcon className="h-6 w-6 text-slate-500" />
                            <span>Get Help</span>
                        </MobileNavLink>
                        <hr className="m-2 border-slate-300/40" />
                        <MobileNavLink href="/login">
                            <LoginIcon className="h-6 w-6 text-slate-500" />
                            <span>Sign in</span>
                        </MobileNavLink>
                    </Popover.Panel>
                </Transition.Child>
            </Transition.Root>
        </Popover>
    )
}

export function Header() {
    return (
        <header className="py-10">
            <Container>
                <nav className="relative z-50 flex justify-between">
                    <div className="flex items-center md:gap-x-8">
                        <Link href="#" aria-label="Home">
                            <NovaLogo className="h-9 w-auto text-slate-700" />
                        </Link>
                        <div className="hidden md:flex md:gap-x-6">
                            <NavLink href="#features">
                                <StarIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Features</div>
                                </div>
                            </NavLink>
                            <NavLink href="#download" className="flex items-center space-x-2">
                                <DownloadIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Download</div>
                                </div>
                            </NavLink>
                            <NavLink href="/docs/2.6/introduction">
                                <BookIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Docs</div>
                                </div>
                            </NavLink>
                            <NavLink href="#resources">
                                <ArchiveIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Resources</div>
                                </div>
                            </NavLink>
                            <NavLink href="https://discord.gg/7WmKUks">
                                <SupportIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Get Help</div>
                                </div>
                            </NavLink>
                        </div>
                    </div>
                    <div className="flex items-center gap-x-5 md:gap-x-8">
                        <div className="hidden md:block">
                            <NavLink href="/login">
                                <LoginIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Sign in</div>
                                </div>
                            </NavLink>
                        </div>
                        <div className="-mr-1 md:hidden">
                            <MobileNavigation />
                        </div>
                    </div>
                </nav>
            </Container>
        </header>
    )
}
