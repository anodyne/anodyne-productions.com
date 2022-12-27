import { useId } from 'react'
import clsx from 'clsx'
import { InstallationIcon } from '@/components/icons/InstallationIcon'
import { LightbulbIcon } from '@/components/icons/LightbulbIcon'
import { PluginsIcon } from '@/components/icons/PluginsIcon'
import { PresetsIcon } from '@/components/icons/PresetsIcon'
import { ThemingIcon } from '@/components/icons/ThemingIcon'
import { WarningIcon } from '@/components/icons/WarningIcon'
import { SupportIcon } from '@/components/icons/SupportIcon'
import { GithubIcon } from '@/components/icons/GithubIcon'
import { DiscordIcon } from '@/components/icons/DiscordIcon'
import { BoltIcon } from '@/components/icons/BoltIcon'

const icons = {
   installation: InstallationIcon,
   presets: PresetsIcon,
   plugins: PluginsIcon,
   theming: ThemingIcon,
   lightbulb: LightbulbIcon,
   bolt: BoltIcon,
   warning: WarningIcon,
   support: SupportIcon,
   github: GithubIcon,
   discord: DiscordIcon,
}

const iconStyles = {
   blue: '[--icon-foreground:theme(colors.slate.900)] [--icon-background:theme(colors.white)]',
   amber: '[--icon-foreground:theme(colors.amber.900)] [--icon-background:theme(colors.amber.100)]',
   emerald: '[--icon-foreground:theme(colors.emerald.900)] [--icon-background:theme(colors.emerald.100)]',
}

export function Icon({ color = 'blue', icon, className, ...props }) {
   let id = useId()
   let IconComponent = icons[icon]

   return (
      <svg
         aria-hidden="true"
         viewBox="0 0 14 14"
         fill="none"
         className={clsx(className, iconStyles[color])}
         {...props}
      >
         <IconComponent id={id} color={color} />
      </svg>
   )
}

const gradients = {
   blue: [
      { stopColor: '#0EA5E9' },
      { stopColor: '#22D3EE', offset: '.527' },
      { stopColor: '#818CF8', offset: 1 },
   ],
   amber: [
      { stopColor: '#F99C26', offset: '.08' },
      { stopColor: '#F2634C', offset: '.837' },
   ],
}

export function Gradient({ color = 'blue', ...props }) {
   return (
      <radialGradient
         cx={0}
         cy={0}
         r={1}
         gradientUnits="userSpaceOnUse"
         {...props}
      >
         {gradients[color].map((stop, stopIndex) => (
            <stop key={stopIndex} {...stop} />
         ))}
      </radialGradient>
   )
}

export function LightMode({ className, ...props }) {
   return <g className={clsx('dark:hidden', className)} {...props} />
}

export function DarkMode({ className, ...props }) {
   return <g className={clsx('hidden dark:inline', className)} {...props} />
}
