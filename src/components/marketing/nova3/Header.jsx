import { Fragment } from 'react'
import Link from 'next/link'
import { Popover, Transition } from '@headlessui/react'
import clsx from 'clsx'
import { Container } from '@/components/marketing/Container'
import { NovaLogo } from '@/components/Logos'
import { NavLink } from '@/components/marketing/NavLink'
import { StarIcon } from '@/components/icons/flex/StarIcon'
import { BookIcon } from '@/components/icons/flex/BookIcon'
import { QuestionIcon } from '@/components/icons/flex/QuestionIcon'
import { LoginIcon } from '@/components/icons/flex/LoginIcon'
import { useAuth } from '@/hooks/auth'
import { UserIcon } from '@/components/icons/flex/UserIcon'

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

function MobileNavigation({ user }) {
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
                        <MobileNavLink href="/docs/3.0/introduction">
                            <BookIcon className="h-6 w-6 text-slate-500" />
                            <span>Docs</span>
                        </MobileNavLink>
                        <MobileNavLink href="#faq">
                            <QuestionIcon className="h-6 w-6 text-slate-500" />
                            <span>FAQs</span>
                        </MobileNavLink>
                        <hr className="m-2 border-slate-300/40" />

                        {user ? (
                            <MobileNavLink href="/login">
                                <UserIcon className="h-6 w-6 text-slate-500" />
                                <span>{user.name}</span>
                            </MobileNavLink>
                        ) : (
                            <MobileNavLink href={process.env.NEXT_PUBLIC_BACKEND_URL + '/login'}>
                                <LoginIcon className="h-6 w-6 text-slate-500" />
                                <span>Sign in</span>
                            </MobileNavLink>
                        )}
                    </Popover.Panel>
                </Transition.Child>
            </Transition.Root>
        </Popover>
    )
}

export function Header() {
    const { user } = useAuth()

    return (
        <header className="py-10">
            <Container>
                <nav className="relative z-50 flex justify-between">
                    <div className="flex items-center md:gap-x-8">
                        <Link href="/" aria-label="Home">
                            <NovaLogo className="h-9 w-auto text-slate-700" />
                        </Link>
                        <div className="hidden md:flex md:gap-x-6">
                            <NavLink href="#features">
                                <StarIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Features</div>
                                </div>
                            </NavLink>
                            <NavLink href="/docs/3.0/introduction">
                                <BookIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>Docs</div>
                                </div>
                            </NavLink>
                            <NavLink href="#faq">
                                <QuestionIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                <div className='relative top-px'>
                                    <div>FAQs</div>
                                </div>
                            </NavLink>
                        </div>
                    </div>
                    <div className="flex items-center gap-x-5 md:gap-x-8">
                        <div className="hidden md:block">
                            {user ? (
                                <NavLink href="/login">
                                    <UserIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                    <div className='relative top-px'>
                                        <div>{user.name}</div>
                                    </div>
                                </NavLink>
                            ) : (
                                <NavLink href={process.env.NEXT_PUBLIC_BACKEND_URL+'/login'}>
                                    <LoginIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                    <div className='relative top-px'>
                                        <div>Sign in</div>
                                    </div>
                                </NavLink>
                            )}
                        </div>
                        <div className="-mr-1 md:hidden">
                            <MobileNavigation user={user} />
                        </div>
                    </div>
                </nav>
            </Container>
        </header>
    )
}
