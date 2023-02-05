import { StarIcon } from '@heroicons/react/20/solid'
import Image from 'next/image'

async function getAddon(slug) {
  const response = await fetch(process.env.NEXT_PUBLIC_API_URL + '/addons/' + slug + '/show', {
    cache: 'no-store'
  })
  const addon = response.json()

  return addon
}

function classNames(...classes) {
  return classes.filter(Boolean).join(' ')
}

export default async function Page({ params }) {
  const addon = await getAddon(params.slug).then(res => res.data)

  return (
    <div className="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">
      <div className="lg:col-span-4 lg:row-end-1">
        {addon.previewImage && (
          <div className="aspect-w-4 aspect-h-3 overflow-hidden rounded-lg bg-slate-100">
            <Image src={addon.previewImage} alt={addon.name} className="object-cover object-center" />
          </div>
        )}
      </div>

      <div className="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
        <div className="flex flex-col-reverse">
          <div className="mt-4">
            <h1 className="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">{addon.name}</h1>

            <h2 id="information-heading" className="sr-only">
              Add-on information
            </h2>

            {addon.latestVersion.version && (
              <p className="mt-2 text-sm text-slate-500">
                {`Version ${addon.latestVersion?.version}`} (Updated{' '}
                <time dateTime={addon.updated_at.raw}>{addon.updated_at.nice}</time>)
              </p>
            )}
          </div>

          <div>
            <h3 className="sr-only">Reviews</h3>
            <div className="flex items-center">
              {[0, 1, 2, 3, 4].map((rating) => (
                <StarIcon
                  key={rating}
                  className={classNames(
                    addon.ratings.value > rating ? 'text-yellow-400' : 'text-slate-300',
                    'h-5 w-5 flex-shrink-0'
                  )}
                  aria-hidden="true"
                />
              ))}
            </div>
            <p className="sr-only">{addon.ratings.value} out of 5 stars</p>
          </div>
        </div>

        {addon.description && (
          <p className="mt-6 text-slate-500">{addon.description}</p>
        )}
      </div>
    </div>
  )
}