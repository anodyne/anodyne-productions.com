'use client'

import { useEffect, useState } from 'react'
import { Listbox, Transition } from '@headlessui/react'
import clsx from 'clsx'

const themes = [
  { name: 'Light', value: 'light', icon: LightIcon },
  { name: 'Dark', value: 'dark', icon: DarkIcon },
  { name: 'System', value: 'system', icon: SystemIcon },
]

function LightIcon(props) {
  return (
    <svg aria-hidden="true" fill="none" viewBox="0 0 14 14" {...props}><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M13.2146 7L12.2194 6.99145" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M11.4004 2.61157L10.6906 3.30923" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M2.59961 2.61157L3.30936 3.30923" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7.02612 0.7854L7.03468 1.78059" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M1.78052 7L0.78533 6.99145" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M3.30933 10.6907L2.59957 11.3883" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M10.6907 10.6907L11.4004 11.3883" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7.03467 12.2194L7.04322 13.2145" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M7.0345 9.94682C8.66201 9.94682 9.98136 8.62746 9.98136 6.99996C9.98136 5.37245 8.66201 4.0531 7.0345 4.0531C5.407 4.0531 4.08765 5.37245 4.08765 6.99996C4.08765 8.62746 5.407 9.94682 7.0345 9.94682Z" /></svg>
  )
}

function DarkIcon(props) {
  return (
    <svg aria-hidden="true" fill="none" viewBox="0 0 14 14" {...props}><path stroke="currentColor" strokeLinejoin="round" d="M12.9308 9.53065C13.1032 9.16518 12.7406 8.79965 12.3413 8.86157C12.0534 8.90622 11.7584 8.92938 11.4579 8.92938C8.29969 8.92938 5.73944 6.36913 5.73944 3.2109C5.73944 2.64412 5.8219 2.09661 5.97546 1.57969C6.09055 1.19231 5.77712 0.783743 5.39176 0.905396C2.86052 1.70447 1.02539 4.0712 1.02539 6.86655C1.02539 10.3183 3.82361 13.1166 7.27539 13.1166C9.77429 13.1166 11.9307 11.65 12.9308 9.53065Z" /></svg>
  )
}

function SystemIcon(props) {
  return (
    <svg aria-hidden="true" fill="none" viewBox="0 0 14 14" {...props}>
        <path d="M1.10135 8.69052C1.17748 9.19966 1.61869 9.57955 2.13327 9.56416C3.71012 9.51698 5.31651 9.45627 7 9.45627C8.67691 9.45627 10.2836 9.49433 11.8513 9.55265C12.3724 9.57204 12.8238 9.19057 12.901 8.67492C13.0624 7.59715 13.25 6.47424 13.25 5.32049C13.25 4.17078 13.0637 3.05169 12.9027 1.97737C12.8247 1.45706 12.3659 1.07448 11.8403 1.09656C10.2904 1.16165 8.66902 1.18472 7 1.18472C5.32421 1.18472 3.70266 1.13931 2.14393 1.08479C1.62486 1.06663 1.17661 1.44762 1.09973 1.96128C0.938201 3.04052 0.75 4.16504 0.75 5.32049C0.75 6.47981 0.93946 7.60798 1.10135 8.69052Z" stroke="currentColor" />
	   <path d="M4.5083 12.5126H9.49161" stroke="currentColor" strokeLinecap="round" />
	   <path d="M7 9.45898L7 12.5126" stroke="currentColor" strokeLinecap="round" />
    </svg>
  )
}

export function ThemeSelector(props) {
  let [selectedTheme, setSelectedTheme] = useState()

  useEffect(() => {
    if (selectedTheme) {
      document.documentElement.setAttribute('data-theme', selectedTheme.value)
    } else {
      setSelectedTheme(
        themes.find(
          (theme) =>
            theme.value === document.documentElement.getAttribute('data-theme')
        )
      )
    }
  }, [selectedTheme])

  return (
    <Listbox
      as="div"
      value={selectedTheme}
      onChange={setSelectedTheme}
      {...props}
    >
      <Listbox.Label className="sr-only">Theme</Listbox.Label>
      <Listbox.Button
        className="flex items-center justify-center"
        aria-label={selectedTheme?.name}
      >
        <LightIcon className="hidden h-6 w-6 text-purple-500 [[data-theme=light]_&]:block" />
        <DarkIcon className="hidden h-6 w-6 text-purple-400 [[data-theme=dark]_&]:block" />
        <LightIcon className="hidden h-6 w-6 text-slate-400 [:not(.dark)[data-theme=system]_&]:block" />
        <DarkIcon className="hidden h-6 w-6 text-slate-400 [.dark[data-theme=system]_&]:block" />
      </Listbox.Button>
      <Transition
          enter="transition duration-100 ease-out"
          enterFrom="transform scale-95 opacity-0"
          enterTo="transform scale-100 opacity-100"
          leave="transition duration-75 ease-out"
          leaveFrom="transform scale-100 opacity-100"
          leaveTo="transform scale-95 opacity-0"
      >
        <Listbox.Options className="absolute top-full right-0 origin-top-right mt-3 -mr-0.5 sm:-mr-3.5 w-36 space-y-1 rounded-lg bg-white p-2 text-sm font-medium shadow-md shadow-black/5 ring-1 ring-black/5 dark:bg-slate-800 dark:highlight-white/5">
          {themes.map((theme) => (
            <Listbox.Option
              key={theme.value}
              value={theme}
              className={({ active, selected }) =>
                clsx(
                  'flex cursor-pointer select-none items-center rounded-md py-1.5 px-3',
                  {
                    'text-purple-500': selected,
                    'text-slate-900 dark:text-white': active && !selected,
                    'text-slate-700 dark:text-slate-400': !active && !selected,
                    'bg-slate-100 dark:bg-slate-900/40': active,
                  }
                )
              }
            >
              {({ selected }) => (
                <>
                  <div>
                    <theme.icon
                      className={clsx(
                        'h-5 w-5',
                        selected
                          ? 'stroke-purple-400 dark:stroke-purple-400'
                          : 'stroke-slate-400'
                      )}
                    />
                  </div>
                  <div className="ml-3">{theme.name}</div>
                </>
              )}
            </Listbox.Option>
          ))}
        </Listbox.Options>
      </Transition>
    </Listbox>
  )
}
