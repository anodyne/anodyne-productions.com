import Card from '@/components/exchange/Card'
import { PlusIcon } from '@heroicons/react/20/solid'

async function getAddons() {
  const response = await fetch(process.env.NEXT_PUBLIC_API_URL + '/addons', {
    cache: 'no-store'
  })
  const addons = response.json()

  return addons
}

const filters = [
  {
    id: 'color',
    name: 'Color',
    options: [
      { value: 'white', label: 'White' },
      { value: 'beige', label: 'Beige' },
      { value: 'blue', label: 'Blue' },
      { value: 'brown', label: 'Brown' },
      { value: 'green', label: 'Green' },
      { value: 'purple', label: 'Purple' },
    ],
  },
  {
    id: 'category',
    name: 'Category',
    options: [
      { value: 'new-arrivals', label: 'All New Arrivals' },
      { value: 'tees', label: 'Tees' },
      { value: 'crewnecks', label: 'Crewnecks' },
      { value: 'sweatshirts', label: 'Sweatshirts' },
      { value: 'pants-shorts', label: 'Pants & Shorts' },
    ],
  },
  {
    id: 'sizes',
    name: 'Sizes',
    options: [
      { value: 'xs', label: 'XS' },
      { value: 's', label: 'S' },
      { value: 'm', label: 'M' },
      { value: 'l', label: 'L' },
      { value: 'xl', label: 'XL' },
      { value: '2xl', label: '2XL' },
    ],
  },
]

export default async function Page() {
  const addons = await getAddons().then(res => res.data)

  return (
    <>
      <div className="border-b border-slate-200 py-12">
        <h1 className="text-4xl font-bold tracking-tight text-slate-900">New Arrivals</h1>
        <p className="mt-4 text-base text-slate-500">
          Checkout out the latest release of Basic Tees, new and improved with four openings!
        </p>
      </div>

      <div className="pt-12 pb-24 lg:grid lg:grid-cols-3 lg:gap-x-8 xl:grid-cols-4">
        <aside>
          <h2 className="sr-only">Filters</h2>

          <button
            type="button"
            className="inline-flex items-center lg:hidden"
            // onClick={() => setMobileFiltersOpen(true)}
          >
            <span className="text-sm font-medium text-slate-700">Filters</span>
            <PlusIcon className="ml-1 h-5 w-5 flex-shrink-0 text-slate-400" aria-hidden="true" />
          </button>

          <div className="hidden lg:block">
            <form className="space-y-10 divide-y divide-slate-200">
              {filters.map((section, sectionIdx) => (
                <div key={section.name} className={sectionIdx === 0 ? null : 'pt-10'}>
                  <fieldset>
                    <legend className="block text-sm font-medium text-slate-900">{section.name}</legend>
                    <div className="space-y-3 pt-6">
                      {section.options.map((option, optionIdx) => (
                        <div key={option.value} className="flex items-center">
                          <input
                            id={`${section.id}-${optionIdx}`}
                            name={`${section.id}[]`}
                            defaultValue={option.value}
                            type="checkbox"
                            className="h-4 w-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                          />
                          <label htmlFor={`${section.id}-${optionIdx}`} className="ml-3 text-sm text-slate-600">
                            {option.label}
                          </label>
                        </div>
                      ))}
                    </div>
                  </fieldset>
                </div>
              ))}
            </form>
          </div>
        </aside>

        <section aria-labelledby="product-heading" className="mt-6 lg:col-span-2 lg:mt-0 xl:col-span-3">
          <h2 id="product-heading" className="sr-only">
            Add-ons
          </h2>

          <div className="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:gap-x-8 xl:grid-cols-2">
            {addons.map((addon) => (
              <Card addon={addon} key={addon.id} />
            ))}
          </div>
        </section>
      </div>
    </>
  )
}
