import { useCallback, useEffect, useState } from 'react'
import { createPortal } from 'react-dom'
import Link from 'next/link'
import Router from 'next/router'
import { DocSearchModal, useDocSearchKeyboardEvents } from '@docsearch/react'

const docSearchConfig = {
  appId: process.env.NEXT_PUBLIC_DOCSEARCH_APP_ID,
  apiKey: process.env.NEXT_PUBLIC_DOCSEARCH_API_KEY,
  indexName: process.env.NEXT_PUBLIC_DOCSEARCH_INDEX_NAME,
}

function Hit({ hit, children }) {
  return <Link href={hit.url}>{children}</Link>
}

function SearchIcon(props) {
  return (
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" {...props}><path strokeLinecap="round" strokeLinejoin="round" d="M6.62497 12.4999C9.86962 12.4999 12.4999 9.86962 12.4999 6.62497C12.4999 3.38031 9.86962 0.75 6.62497 0.75C3.38031 0.75 0.75 3.38031 0.75 6.62497C0.75 9.86962 3.38031 12.4999 6.62497 12.4999Z" /><path strokeLinecap="round" strokeLinejoin="round" d="M13.2501 13.25L10.7834 10.7834" /></svg>
  )
}

export function Search() {
  let [isOpen, setIsOpen] = useState(false)
  let [modifierKey, setModifierKey] = useState()

  const onOpen = useCallback(() => {
    setIsOpen(true)
  }, [setIsOpen])

  const onClose = useCallback(() => {
    setIsOpen(false)
  }, [setIsOpen])

  useDocSearchKeyboardEvents({ isOpen, onOpen, onClose })

  useEffect(() => {
    setModifierKey(
      /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform) ? '⌘' : 'Ctrl '
    )
  }, [])

  return (
    <>
      <button
        type="button"
        className="group flex h-6 w-6 items-center justify-center sm:justify-start md:h-auto md:w-80 md:flex-none md:rounded-lg md:py-2.5 md:pl-4 md:pr-3.5 md:text-sm md:ring-1 md:ring-slate-200 md:hover:ring-slate-300 dark:md:bg-slate-800/75 dark:md:ring-inset dark:md:ring-white/5 dark:md:hover:bg-slate-700/40 dark:md:hover:ring-slate-500 lg:w-96"
        onClick={onOpen}
      >
        <SearchIcon className="h-5 w-5 flex-none stroke-slate-400 group-hover:stroke-slate-500 dark:stroke-slate-500 md:group-hover:stroke-slate-400" />
        <span className="sr-only md:not-sr-only md:ml-2 md:text-slate-500 md:dark:text-slate-400">
          Search docs
        </span>
        {modifierKey && (
          <kbd className="ml-auto hidden font-medium text-slate-400 dark:text-slate-500 md:block">
            <kbd className="font-sans">{modifierKey}</kbd>
            <kbd className="font-sans">K</kbd>
          </kbd>
        )}
      </button>
      {isOpen &&
        createPortal(
          <DocSearchModal
            {...docSearchConfig}
            initialScrollY={window.scrollY}
            onClose={onClose}
            hitComponent={Hit}
            navigator={{
              navigate({ itemUrl }) {
                Router.push(itemUrl)
              },
            }}
          />,
          document.body
        )}
    </>
  )
}
