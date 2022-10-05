import Link from 'next/link'

export function NavLink({ href, children }) {
    return (
        <Link
            href={href}
            className="inline-flex items-center space-x-2 rounded-md py-1 px-3 ring-1 ring-inset ring-transparent dark:ring-0 text-slate-600 dark:text-slate-400 hover:bg-white/30 dark:hover:bg-white/10 hover:ring-white/30 hover:text-slate-900 dark:hover:text-slate-200 transition font-display leading-none"
        >
            {children}
        </Link>
    )
}
