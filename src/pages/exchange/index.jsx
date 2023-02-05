import { ExchangeLayout } from '@/layouts/ExchangeLayout'
import axios from '@/lib/axios'

import { Fragment, useState } from 'react'
import { Dialog, Disclosure, Popover, Tab, Transition } from '@headlessui/react'
import { Bars3Icon, MagnifyingGlassIcon, ShoppingBagIcon, XMarkIcon } from '@heroicons/react/24/outline'
import { ChevronDownIcon, PlusIcon } from '@heroicons/react/20/solid'
import { Tag } from '@/components/exchange/Tag'
import Card from '@/components/exchange/Card'

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
const products = [
  {
    id: 1,
    name: 'Basic Tee 8-Pack',
    href: '#',
    price: '$256',
    description: 'Get the full lineup of our Basic Tees. Have a fresh shirt all week, and an extra for laundry day.',
    options: '8 colors',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg',
    imageAlt: 'Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green.',
  },
  {
    id: 2,
    name: 'Basic Tee',
    href: '#',
    price: '$32',
    description: 'Look like a visionary CEO and wear the same black t-shirt every day.',
    options: 'Black',
    imageSrc: 'https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-02.jpg',
    imageAlt: 'Front of plain black t-shirt.',
  },
  // More products...
]

function classNames(...classes) {
  return classes.filter(Boolean).join(' ')
}

export default function ExchangeHome({ addons }) {
  return (
    <>
      <div className="border-b border-slate-200 pt-24 pb-10">
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
            onClick={() => setMobileFiltersOpen(true)}
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
            //   <div
            //     key={addon.id}
            //     className="group relative flex flex-col overflow-hidden rounded-lg border border-slate-200 bg-white"
            //   >
            //     <div className="aspect-w-3 aspect-h-4 bg-slate-200 group-hover:opacity-75 sm:aspect-none sm:h-96">
            //       <img
            //         src="https://via.placeholder.com/500"
            //         alt="alt text"
            //         className="h-full w-full object-cover object-center sm:h-full sm:w-full"
            //       />
            //     </div>
            //     <div className="flex flex-1 flex-col space-y-2 p-4">
            //       <div className="flex items-center gap-x-3">
            //         <Tag>{addon.type}</Tag>

            //         {addon.products.map(product => (
            //             <Tag key={product.name}>{product.name}</Tag>
            //         ))}
            //       </div>
            //       <h3 className="text-sm font-medium text-slate-900">
            //         <a href="#">
            //           <span aria-hidden="true" className="absolute inset-0" />
            //           {addon.name}
            //         </a>
            //       </h3>

            //       <div className="flex items-center space-x-3">
            //     <div className="flex items-center space-x-0.5">
            //         {[...Array(addon.ratings.floor)].map((a, b) =>
            //             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="h-4 w-4 text-amber-400" key={b}><path fillRule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clipRule="evenodd" /></svg>
            //         )}
            //         {[...Array(addon.ratings.remaining)].map((c, d) =>
            //             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="h-4 w-4 text-slate-300" key={d}><path fillRule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clipRule="evenodd" /></svg>
            //         )}
            //     </div>
            //     <span className="text-xs font-semibold text-slate-500">{addon.ratings.value}</span>
            //     {/* <span className="text-xs text-slate-500">(12 reviews)</span> */}
            // </div>

            //       <p className="text-sm text-slate-500">{addon.description}</p>
            //       <div className="flex flex-1 flex-col justify-end">
            //         {/* <p className="text-sm italic text-slate-500">{product.options}</p> */}
            //         {/* <p className="text-base font-medium text-slate-900">{product.price}</p> */}
            //       </div>
            //     </div>
            //   </div>
            ))}
          </div>
        </section>
      </div>
    </>
  )
}

export async function getServerSideProps() {
    const response = await axios.get('/api/addons')

    return {
        props: {
            addons: response.data.data
        }
    }
}

ExchangeHome.layoutProps = {
    Layout: ExchangeLayout,
    PageTitle: 'Nova Exchange by Anodyne Productions'
}
