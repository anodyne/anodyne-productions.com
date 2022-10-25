import Link from 'next/link'
import clsx from 'clsx'

const baseStyles = {
    solid: 'group inline-flex items-center justify-center rounded-full py-2 px-5 font-medium font-display focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 transition',
    nodark: 'group inline-flex items-center justify-center rounded-full py-2 px-5 font-medium font-display focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 transition',
    outline: 'group inline-flex ring-1 items-center justify-center rounded-full py-2 px-5 font-medium font-display focus:outline-none transition',
}

const variantStyles = {
   solid: {
      none: '',
      slate: 'bg-slate-900 dark:bg-slate-200 text-white dark:text-slate-600 hover:bg-slate-700 dark:hover:bg-white hover:text-slate-100 dark:hover:text-slate-900 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900',
      blue: 'bg-sky-600 text-white hover:text-slate-100 hover:bg-sky-500 active:bg-sky-800 active:text-sky-100 focus-visible:outline-sky-600',
      white: 'bg-white text-slate-900 hover:bg-blue-50 active:bg-blue-200 active:text-slate-600 focus-visible:outline-white',
   },
   outline: {
      none: '',
      slate: 'ring-slate-900/20 dark:ring-white/30 text-slate-600 dark:text-white/50 hover:text-slate-900 dark:hover:text-white hover:ring-slate-900/50 dark:hover:ring-white/60 active:bg-slate-100 active:text-slate-600 focus-visible:outline-blue-600 focus-visible:ring-slate-300',
      blue: 'ring-sky-200 text-sky-700 hover:text-sky-900 hover:ring-sky-300 active:bg-sky-100 active:text-sky-600 focus-visible:outline-blue-600 focus-visible:ring-sky-300',
      white: 'ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white',
   },
   nodark: {
      none: '',
      slate: 'bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900',
   }
}

export function Button({
   variant = 'solid',
   color = 'slate',
   className,
   href,
   ...props
}) {
   className = clsx(
      baseStyles[variant],
      variantStyles[variant][color],
      className
   )

   return href ? (
      <Link href={href} className={className} {...props} />
   ) : (
      <button className={className} {...props} />
   )
}
