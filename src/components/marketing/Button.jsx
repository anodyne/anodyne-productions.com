import Link from 'next/link'
import clsx from 'clsx'

const baseStyles = 'group relative inline-flex items-center justify-center rounded-full font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 transition'

const sizeStyles = {
  sm: 'py-1.5 px-4',
  md: 'py-2 px-5',
}

const variantStyles = {
  dark: {
    primary: 'bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-50 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
    secondary: 'bg-slate-900 hover:bg-gradient-to-b hover:from-slate-900 hover:to-purple-900/30 ring-1 ring-slate-800 text-white hover:ring-purple-700/30 shadow-md hover:shadow-purple-700/40 hover:text-purple-100 focus-visible:outline-white',
    brand: 'bg-purple-600 text-white shadow-md hover:bg-purple-700',
  },
  light: {
    primary: 'bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 hover:shadow-md focus-visible:outline-slate-900',
    secondary: 'bg-white hover:bg-gradient-to-b hover:from-white hover:to-purple-100 ring-1 ring-slate-200 text-slate-700 hover:ring-purple-500/20 shadow hover:shadow-md hover:shadow-purple-500/30 hover:text-purple-900 focus-visible:outline-white',
  },
}

export function Button({
  variant = 'light',
  color = 'primary',
  size = 'md',
  className,
  href,
  ...props
}) {
  className = clsx(
    baseStyles,
    variantStyles[variant][color],
    sizeStyles[size],
    className
  )

  return href ? (
    <Link href={href} className={className} {...props} />
  ) : (
    <button className={className} {...props} />
  )
}
