import { useEffect } from 'react'

export function MarketingLayout({ children, title }) {
  useEffect(() => {
    document.documentElement.classList.add('antialiased')
    document.documentElement.classList.add('h-full')
    document.documentElement.classList.add('scroll-smooth')
    document.body.classList.remove('bg-white')
    document.body.classList.add('bg-slate-50')
    document.body.classList.add('dark:bg-slate-900')
    document.body.classList.add('flex')
    document.body.classList.add('h-full')
    document.body.classList.add('flex-col')
  })

  return (
    <>
      {children}
    </>
  )
}
