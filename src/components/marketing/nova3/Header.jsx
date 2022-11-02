import { Fragment } from 'react'
import Link from 'next/link'
import { Popover, Transition, Menu } from '@headlessui/react'
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
import { LogoutIcon } from '@/components/icons/flex/LogoutIcon'
import { useAuth } from '@/hooks/auth'
import { UserIcon } from '@/components/icons/flex/UserIcon'
import { HomeIcon } from '@/components/icons/flex/HomeIcon'
import { ThemeSelector } from '@/components/ThemeSelector'
import { logout } from '@/hooks/auth'
import { QuestionIcon } from '@/components/icons/flex/QuestionIcon'

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
                  <MobileNavLink href="/features">
                     <StarIcon className="h-6 w-6 text-slate-500" />
                     <span>Features</span>
                  </MobileNavLink>
                  <MobileNavLink href={"/docs/3.0/introduction"}>
                     <BookIcon className="h-6 w-6 text-slate-500" />
                     <span>Docs</span>
                  </MobileNavLink>
                  <MobileNavLink href="/#faqs">
                     <QuestionIcon className="h-6 w-6 text-slate-500" />
                     <span>FAQs</span>
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

export function Header() {
   const { user } = useAuth()

   return (
      <header className="py-10 bg-slate-50 dark:bg-slate-900">
         <Container>
               <nav className="relative z-50 flex justify-between">
                  <div className="flex items-center md:gap-x-8">
                     <Link href="/" aria-label="Home">
                           <NovaLogo className="h-9 w-auto text-slate-700 dark:text-white" />
                     </Link>
                     <div className="hidden md:flex md:gap-x-6">
                           <NavLink href="/features">
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
                           <NavLink href="/#faq">
                              <BookIcon className="shrink-0 h-6 w-6 text-slate-500" />
                              <div className='relative top-px'>
                                 <div>FAQs</div>
                              </div>
                           </NavLink>
                     </div>
                  </div>
                  <div className="flex items-center gap-x-5 md:gap-x-8">
                     <div className="hidden md:flex md:items-center relative space-x-4">
                           <ThemeSelector />
                           {user ? (
                              <Menu as="div" className="relative">
                                 <Menu.Button className="inline-flex items-center space-x-2 rounded-md py-1 px-3 ring-1 ring-inset ring-transparent dark:ring-0 text-slate-600 dark:text-slate-400 hover:bg-white/30 dark:hover:bg-white/10 hover:ring-white/30 hover:text-slate-900 dark:hover:text-slate-200 transition font-display leading-none">
                                       <UserIcon className="shrink-0 h-6 w-6 text-slate-500" />
                                       <div className='relative top-px'>
                                          <div>Account</div>
                                       </div>
                                 </Menu.Button>
                                 <Transition
                                       enter="transition duration-100 ease-out"
                                       enterFrom="transform scale-95 opacity-0"
                                       enterTo="transform scale-100 opacity-100"
                                       leave="transition duration-75 ease-out"
                                       leaveFrom="transform scale-100 opacity-100"
                                       leaveTo="transform scale-95 opacity-0"
                                 >
                                       <Menu.Items className="absolute top-full right-0 mt-3 -mr-0.5 w-60 origin-top-right divide-y divide-slate-100 dark:divide-slate-600/30 rounded-lg bg-white dark:bg-slate-800 text-sm font-medium text-slate-900 dark:text-slate-200 shadow-md ring-1 ring-slate-900/5 dark:highlight-white/5 focus:outline-none sm:-mr-3.5">
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
                                                               !active && 'text-slate-700 dark:text-slate-400',
                                                               active && 'bg-slate-100 dark:bg-slate-900/40 text-slate-900 dark:text-white'
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
                                                               !active && 'text-slate-700 dark:text-slate-400',
                                                               active && 'bg-slate-100 dark:bg-slate-900/40 text-slate-900 dark:text-white'
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
                                                         !active && 'text-slate-700 dark:text-slate-400',
                                                         active && 'bg-slate-100 dark:bg-slate-900/40 text-slate-900 dark:text-white'
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
                              <NavLink href={process.env.NEXT_PUBLIC_BACKEND_URL + '/login'}>
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
