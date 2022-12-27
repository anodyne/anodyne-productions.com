import { Menu, Transition } from '@headlessui/react'
import clsx from 'clsx'
import { Fragment } from 'react'

export function VersionSwitcher({ currentVersion }) {
   const versions = process.env.NEXT_PUBLIC_DOCS_VERSIONS.split(',')

   return (
      <Menu as="div" className="relative">
         <Menu.Button className="text-sm font-medium bg-slate-600/10 rounded-full py-1 px-3 flex items-center space-x-2 hover:bg-slate-600/20 dark:highlight-white/5 text-slate-600 dark:text-slate-400 transition">
            v{currentVersion}
            <svg width="6" height="3" className="ml-2 overflow-visible" aria-hidden="true"><path d="M0 0L3 3L6 0" fill="none" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" /></svg>
         </Menu.Button>

         <Transition
            enter="transition duration-100 ease-out"
            enterFrom="transform scale-95 opacity-0"
            enterTo="transform scale-100 opacity-100"
            leave="transition duration-75 ease-out"
            leaveFrom="transform scale-100 opacity-100"
            leaveTo="transform scale-95 opacity-0"
         >
            <Menu.Items className="absolute top-full right-0 mt-2 p-2 w-40 origin-top-right rounded-lg bg-white dark:bg-slate-800 text-sm font-medium text-slate-900 dark:text-slate-200 shadow-md ring-1 ring-slate-900/5 dark:highlight-white/5 z-50">
               {versions.map((version) => (
                  <Menu.Item key={version} as={Fragment} disabled={version === currentVersion}>
                     {({ active, disabled }) => (
                        <a
                           href={`/docs/${version}/introduction`}
                           className={clsx(
                              'flex items-center justify-between rounded-md py-1.5 px-3',
                              {
                                 'text-sky-500': disabled,
                                 'bg-slate-100 dark:bg-slate-900/40 text-slate-900 dark:text-white': active && !disabled,
                                 'text-slate-700 dark:text-slate-400': !active && !disabled,
                              }
                           )}
                        >
                           <span>v{version}</span>

                           {disabled && (
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3} stroke="currentColor" className="w-4 h-4"><path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                           )}
                        </a>
                     )}
                  </Menu.Item>
               ))}
            </Menu.Items>
         </Transition>
      </Menu>
   )
}