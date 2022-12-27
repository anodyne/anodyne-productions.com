import clsx from 'clsx'
import { Icon } from '@/components/Icon'

const styles = {
   note: {
      container: 'border border-sky-500/20 bg-sky-50/50 text-sky-700 dark:border-sky-500/30 dark:bg-sky-500/5 dark:text-sky-200 dark:[--tw-prose-links:theme(colors.white)] dark:[--tw-prose-links-hover:theme(colors.sky.300)',
      body: 'text-sky-600 dark:text-sky-300 prose-strong:text-sky-700 dark:prose-strong:text-sky-100',
   },
   warning: {
      container: 'border border-amber-500/20 bg-amber-50/50 text-amber-800 dark:border-amber-500/30 dark:bg-amber-500/5 dark:text-amber-200 dark:[--tw-prose-links:theme(colors.white)] dark:[--tw-prose-links-hover:theme(colors.amber.300)',
      body: 'text-amber-700 dark:text-amber-300 prose-strong:text-amber-800 dark:prose-strong:text-amber-100',
   },
   tip: {
      container: 'border border-emerald-500/20 bg-emerald-50/50 text-emerald-700 dark:border-emerald-500/30 dark:bg-emerald-500/5 dark:text-emerald-200 dark:[--tw-prose-links:theme(colors.white)] dark:[--tw-prose-links-hover:theme(colors.emerald.300)',
      body: 'text-emerald-600 dark:text-emerald-300 prose-strong:text-emerald-700 dark:prose-strong:text-emerald-100',
   },
}

const icons = {
   note: (props) => <Icon icon="lightbulb" {...props} />,
   warning: (props) => <Icon icon="warning" color="amber" {...props} />,
   tip: (props) => <Icon icon="bolt" color="emerald" {...props} />,
}

export function Callout({ type, title, children }) {
   let IconComponent = icons[type]

   return (
      <div className={clsx('my-8 flex gap-2.5 rounded-2xl p-4 leading-6', styles[type].container)}>
         <IconComponent className="h-6 w-6 flex-none" />
         <div>
            <p className="m-0 font-display text-xl">
               {title}
            </p>
            <div className={clsx('prose dark:prose-invert mt-2.5', styles[type].body)}>
               {children}
            </div>
         </div>
      </div>
   )
}

export function Note({ title = 'Note', children }) {
  return (
    <Callout title={title} type="note">
        {children}
    </Callout>
  )
}

export function Tip({ title = 'Tip', children }) {
  return (
    <Callout title={title} type="tip">
        {children}
    </Callout>
  )
}

export function Warning({ title = 'Warning', children }) {
  return (
    <Callout title={title} type="warning">
        {children}
    </Callout>
  )
}
