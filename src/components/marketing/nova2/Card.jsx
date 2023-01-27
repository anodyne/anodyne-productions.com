import Link from 'next/link'
import clsx from 'clsx'
import { ChevronRightIcon } from '@/components/icons/flex/ChevronRightIcon'
import { ArrowRightCircleIcon } from '@/components/icons/flex/ArrowRightCircleIcon'

export function Card({ as: Component = 'div', className, children }) {
    return (
        <Component className={clsx(className, 'group relative flex flex-col items-start')}>
            {children}
        </Component>
    )
}

Card.Link = function CardLink({ children, ...props }) {
    return (
        <>
            <div className="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-slate-100 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl" />
            <Link {...props}>
                <span className="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl" />
                <span className="relative z-10">{children}</span>
            </Link>
        </>
    )
}

Card.Title = function CardTitle({ as: Component = 'h2', href, children }) {
    return (
        <Component className="font-display text-xl text-slate-800">
            {href ? <Card.Link href={href}>{children}</Card.Link> : children}
        </Component>
    )
}

Card.Description = function CardDescription({ children }) {
    return (
        <p className="relative z-10 mt-2 text-sm text-slate-600">
            {children}
        </p>
    )
}

Card.Cta = function CardCta({ children }) {
    return (
        <div
            aria-hidden="true"
            className="relative z-10 mt-4 flex items-center text-sm font-medium text-sky-500 group-hover:text-sky-600 dark:group-hover:text-sky-400 transition"
        >
            {children}
            <span className="ml-1.5">&rarr;</span>
        </div>
    )
}

Card.Eyebrow = function CardEyebrow({
    as: Component = 'p',
    decorate = false,
    className,
    children,
    ...props
}) {
    return (
        <Component
            className={clsx(
                className,
                'relative z-10 order-first mb-1 flex items-center text-sm font-medium text-slate-400',
                decorate && 'pl-3.5'
            )}
            {...props}
        >
            {decorate && (
                <span
                    className="absolute inset-y-0 left-0 flex items-center"
                    aria-hidden="true"
                >
                    <span className="h-4 w-0.5 rounded-full bg-slate-300" />
                </span>
            )}
            <span>{children}</span>
        </Component>
    )
}
