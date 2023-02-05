import { AtSymbolIcon } from '@/components/icons/flex/AtSymbolIcon'
import { LockClosedIcon } from '@/components/icons/flex/LockClosedIcon'
import { Button } from '@/components/marketing/Button'

const features = [
  {
    name: 'Email address',
    description:
      'admin@admin.com',
    icon: AtSymbolIcon,
  },
  {
    name: 'Password',
    description: 'secret',
    icon: LockClosedIcon,
  },
]

export function Demo() {
  return (
    <section id="demo" className="overflow-hidden bg-slate-900 py-24 sm:py-32">
      <div className="mx-auto max-w-7xl md:px-6 lg:px-8">
        <div className="grid grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
          <div className="px-6 lg:px-0 lg:pt-4 lg:pr-4">
            <div className="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
              <h2 className="text-lg font-semibold leading-8 tracking-tight text-purple-400">Demo</h2>
              <p className="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Explore Nova 3 today</p>
              <p className="mt-6 text-lg leading-8 text-slate-500">
                Instead of endlessly scrolling through a list of features and improvements, experience Nova 3 for yourself with our demo site that&rsquo;s regularly updated with the latest development work. Use the email address and password below to start exploring.
              </p>
              <dl className="mt-10 max-w-xl space-y-8 text-base leading-7 text-slate-500 lg:max-w-none">
                {features.map((feature) => (
                  <div key={feature.name} className="relative pl-9">
                    <dt className="inline font-semibold text-white">
                      <feature.icon className="absolute top-1 left-1 h-5 w-5 text-purple-400" aria-hidden="true" />
                      {feature.name}
                    </dt>{' '}
                    <dd className="inline">{feature.description}</dd>
                  </div>
                ))}

                <Button href="#" variant="dark" color="secondary">
                  Go to the demo <span className="pl-1.5" aria-hidden="true">&rarr;</span>
                </Button>
              </dl>
            </div>
          </div>
          <div className="sm:px-6 lg:px-0">
            <div className="relative isolate overflow-hidden bg-purple-500 px-6 pt-8 sm:mx-auto sm:max-w-2xl sm:rounded-3xl sm:pt-16 sm:pl-16 sm:pr-0 lg:mx-0 lg:max-w-none">
              <div
                className="absolute -inset-y-px -left-3 -z-10 w-full origin-bottom-left skew-x-[-30deg] bg-purple-100 opacity-20 ring-1 ring-inset ring-white"
                aria-hidden="true"
              />
              <div className="mx-auto max-w-2xl sm:mx-0 sm:max-w-none">
                <img
                  src="https://tailwindui.com/img/component-images/project-app-screenshot.png"
                  alt="Product screenshot"
                  width={2432}
                  height={1442}
                  className="-mb-12 w-[57rem] max-w-none rounded-tl-xl bg-slate-800 ring-1 ring-white/10"
                />
              </div>
              <div
                className="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10 sm:rounded-3xl"
                aria-hidden="true"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
