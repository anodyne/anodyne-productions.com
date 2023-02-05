'use client'

import Link from 'next/link'
import { Popover, Transition, Menu } from '@headlessui/react'
import clsx from 'clsx'

import { useAuth, logout } from '@/hooks/auth'
import { NovaLogo } from '@/components/Logos'
import { Button } from '@/components/marketing/Button'

function NavLink({ href, dark = false, children }) {
  return (
    <Link
      href={href}
      className={clsx(
        'transition',
        {
          'hover:text-purple-600': !dark,
          'hover:text-purple-400': dark,
        }
      )}
    >
      {children}
    </Link>
  )
}

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
                  <MobileNavLink href="#download">
                     <DownloadIcon className="h-6 w-6 text-slate-500" />
                     <span>Download</span>
                  </MobileNavLink>
                  <MobileNavLink href={"/docs/" + process.env.NEXT_PUBLIC_DOCS_CURRENT_VERSION + "/introduction"}>
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

                  {user ? (
                     <>
                        <p className="truncate w-full p-2 font-medium" role="none">
                           <span className="block text-sm text-slate-500" role="none">Signed in as</span>
                           <span className="mt-0.5 font-semibold" role="none">{user.email}</span>
                        </p>
                        <MobileNavLink href={process.env.NEXT_PUBLIC_BACKEND_URL}>
                           <HomeIcon className="h-6 w-6 text-slate-500" />
                           <span>Dashboard</span>
                        </MobileNavLink>
                        <MobileNavLink href="/login">
                           <UserIcon className="h-6 w-6 text-slate-500" />
                           <span>My profile</span>
                        </MobileNavLink>
                        <MobileNavLink href="/login">
                           <LogoutIcon className="h-6 w-6 text-slate-500" />
                           <span>Log out</span>
                        </MobileNavLink>
                     </>
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

export function Navigation({ items = [], dark = false }) {
  const { user } = useAuth()

  return (
    <nav
      className={clsx(
        'relative z-20 pt-6 lg:pt-8 flex items-center justify-between font-semibold text-sm leading-6',
        {
          'text-slate-700': !dark,
          'text-white': dark,
        }
      )}
    >
      <div className="flex items-center md:gap-x-12">
        <Link href="/" aria-label="Home">
            <NovaLogo
              className={clsx(
                'h-9 w-auto',
                {
                  'text-slate-700': !dark,
                  'text-white': dark,
                }
              )}
            />
        </Link>
        <div className="hidden md:flex items-center">
          <nav>
            <ul className="flex items-center gap-x-8">
              {items.map((item) => (
                <li key={item.href}>
                  <NavLink href={item.href} dark={dark}>{item.title}</NavLink>
                </li>
              ))}
            </ul>
          </nav>
        </div>
      </div>

      <div className="flex items-center">
        {user ? (
          <Menu as="div" className="relative">
            <Menu.Button className="bg-white py-1.5 px-4 font-semibold text-slate-600 ring-1 ring-slate-200 rounded-full shadow hover:shadow-md hover:ring-slate-300 transition">My Account</Menu.Button>

            <Transition
                enter="transition duration-100 ease-out"
                enterFrom="transform scale-95 opacity-0"
                enterTo="transform scale-100 opacity-100"
                leave="transition duration-75 ease-out"
                leaveFrom="transform scale-100 opacity-100"
                leaveTo="transform scale-95 opacity-0"
            >
                <Menu.Items className="absolute top-full right-0 mt-3 -mr-0.5 w-60 origin-top-right divide-y divide-slate-100 dark:divide-slate-600/30 rounded-lg bg-white text-sm font-medium text-slate-900 shadow-md ring-1 ring-slate-900/5 focus:outline-none sm:-mr-1.5">
                  <p className="truncate py-3 px-5" role="none">
                      <span className="block text-xs text-slate-500" role="none">Signed in as</span>
                      <span className="mt-0.5 font-semibold" role="none">{user.email}</span>
                  </p>
                  <div className="p-2">
                      <Menu.Item>
                        {({ active }) => (
                            <a
                              href={process.env.NEXT_PUBLIC_BACKEND_URL}
                              className={clsx(
                                  'block rounded-md py-1.5 px-3',
                                  !active && 'text-slate-700',
                                  active && 'bg-slate-100 text-slate-900'
                              )}
                            >
                              Dashboard
                            </a>
                        )}
                      </Menu.Item>
                      <Menu.Item>
                        {({ active }) => (
                            <a
                              href={process.env.NEXT_PUBLIC_BACKEND_URL + '/profile'}
                              className={clsx(
                                  'block rounded-md py-1.5 px-3',
                                  !active && 'text-slate-700',
                                  active && 'bg-slate-100 text-slate-900'
                              )}
                            >
                              My profile
                            </a>
                        )}
                      </Menu.Item>
                  </div>
                  <div className="p-2">
                      <Menu.Item>
                        {({ active }) => (
                            <button
                              className={clsx(
                                  'block w-full text-left rounded-md py-1.5 px-3',
                                  !active && 'text-slate-700',
                                  active && 'bg-slate-100 text-slate-900'
                              )}
                              onClick={logout}
                            >Log out</button>
                            )}
                      </Menu.Item>
                  </div>
                </Menu.Items>
            </Transition>
          </Menu>
        ) : (
          <Button
            href={process.env.NEXT_PUBLIC_BACKEND_URL + '/login'}
            variant={dark ? 'dark' : 'light'}
            color="secondary"
            size="sm"
          >
            Sign in
          </Button>
        )}
      </div>
    </nav>
  )
}