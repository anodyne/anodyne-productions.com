'use client'

import { Fragment, useState } from 'react'

import { Listbox, Transition } from '@headlessui/react'
import { Float } from '@headlessui-float/react'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/react/24/solid'
import { DownloadIcon } from '@/components/icons/flex/DownloadIcon'
import { AlertCircleIcon } from '@/components/icons/flex/AlertCircleIcon'
import { Button } from '@/components/marketing/Button'

const genres = [
  { value: 'bl5', name: 'Babylon 5' },
  { value: 'blank', name: 'Blank' },
  { value: 'bsg', name: 'Battlestar Galactica' },
  { value: 'dnd', name: 'Dungeons and Dragons' },
  { value: 'dsv', name: 'seaQuest DSV' },
  { value: 'sga', name: 'Stargate Atlantis' },
  { value: 'sg1', name: 'Stargate SG-1' },
  { value: 'baj', name: 'Bajorans (Star Trek)' },
  { value: 'crd', name: 'Cardassians (Star Trek)' },
  { value: 'ds9', name: 'Deep Space Nine (Star Trek)' },
  { value: 'ent', name: 'Enterprise era (Star Trek)' },
  { value: 'kli', name: 'Klingons (Star Trek)' },
  { value: 'mov', name: 'Movie era (Star Trek)' },
  { value: 'rom', name: 'Romulans (Star Trek)' },
  { value: 'tos', name: 'The Original Series (Star Trek)' },
  { value: 'sto', name: 'Star Trek Online' },
]

export function Download({ latestVersion }) {
  const versions = [
    { name: latestVersion, value: latestVersion },
    { name: '2.6.2 (Legacy - PHP 5.6)', value: '2.6.2' },
    { name: '2.3.2 (Legacy - PHP 5.2)', value: '2.3.2' },
  ]

  const [selectedVersion, setSelectedVersion] = useState(versions[0])
  const [selectedGenre, setSelectedGenre] = useState()

  function getDownloadLink() {
    return `${process.env.NEXT_PUBLIC_ASSETS_URL}/nova-${selectedVersion.value}-${selectedGenre.value}.zip`
  }

  return (
    <section id="download" className="relative isolate overflow-hidden bg-slate-900">
      <div className="py-24 px-6 sm:px-6 sm:py-32 lg:px-8">
        <div className="mx-auto max-w-2xl text-center">
          <h2 className="text-3xl tracking-tight text-white/50 sm:text-4xl">
            Ready to get started?
          </h2>

          <h2 className="mt-1.5 font-bold text-3xl tracking-tight text-white sm:text-4xl">
            Download Nova today.
          </h2>

          <div className="relative grid grid-cols-1 sm:grid-cols-2 gap-8 text-left mt-6">
            <Listbox value={selectedVersion} onChange={setSelectedVersion}>
              <div className="relative">
                <Listbox.Label className="font-medium text-white/75 text-sm">Version</Listbox.Label>

                <Float offset={4} portal>
                  <Listbox.Button className="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-sky-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                    <span className="block truncate">{selectedVersion?.name || 'Select a version'}</span>
                    <span className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                      <ChevronUpDownIcon className="h-5 w-5 text-slate-400" aria-hidden="true" />
                    </span>
                  </Listbox.Button>

                  <Transition
                    as={Fragment}
                    leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                  >
                    <Listbox.Options className="max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                      {versions.map((version, versionIdx) => (
                        <Listbox.Option
                          key={versionIdx}
                          className={({ active }) =>
                            `relative cursor-default select-none py-2 pl-10 pr-4 ${
                              active ? 'bg-sky-100 text-sky-900' : 'text-slate-900'
                            }`
                          }
                          value={version}
                        >
                          {({ selected }) => (
                            <>
                              <span
                                className={`block truncate ${
                                  selected ? 'font-medium' : 'font-normal'
                                }`}
                              >
                                {version.name}
                              </span>
                              {selected ? (
                                <span className="absolute inset-y-0 left-0 flex items-center pl-3 text-sky-600">
                                  <CheckIcon className="h-5 w-5" aria-hidden="true" />
                                </span>
                              ) : null}
                            </>
                          )}
                        </Listbox.Option>
                      ))}
                    </Listbox.Options>
                  </Transition>
                </Float>
              </div>
            </Listbox>

            <Listbox value={selectedGenre} onChange={setSelectedGenre}>
              <div className="relative">
                <Listbox.Label className="font-medium text-white/75 text-sm">Genre</Listbox.Label>

                <Float offset={4} portal>
                  <Listbox.Button className="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-sky-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
                    <span className="block truncate">{selectedGenre?.name || 'Select a genre'}</span>
                    <span className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                      <ChevronUpDownIcon className="h-5 w-5 text-slate-400" aria-hidden="true" />
                    </span>
                  </Listbox.Button>

                  <Transition
                    as={Fragment}
                    leave="transition ease-in duration-100"
                    leaveFrom="opacity-100"
                    leaveTo="opacity-0"
                  >
                    <Listbox.Options className="max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                      {genres.map((genre, genreIdx) => (
                        <Listbox.Option
                          key={genreIdx}
                          className={({ active }) =>
                            `relative cursor-default select-none py-2 pl-10 pr-4 ${
                              active ? 'bg-sky-100 text-sky-900' : 'text-slate-900'
                            }`
                          }
                          value={genre}
                        >
                          {({ selected }) => (
                            <>
                              <span
                                className={`block truncate ${
                                  selected ? 'font-medium' : 'font-normal'
                                }`}
                              >
                                {genre.name}
                              </span>
                              {selected ? (
                                <span className="absolute inset-y-0 left-0 flex items-center pl-3 text-sky-600">
                                  <CheckIcon className="h-5 w-5" aria-hidden="true" />
                                </span>
                              ) : null}
                            </>
                          )}
                        </Listbox.Option>
                      ))}
                    </Listbox.Options>
                  </Transition>
                </Float>
              </div>
            </Listbox>
          </div>

          {selectedVersion.value.includes('2.6') ? (
            <div className="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left">
              <AlertCircleIcon className="h-8 w-8 text-purple-300 shrink-0" aria-hidden="true" />
              <span>Nova 2.6.2 is legacy software and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
            </div>
          ) : null}

          {selectedVersion.value.includes('2.3') ? (
            <div className="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left">
              <AlertCircleIcon className="h-8 w-8 text-purple-300 shrink-0" aria-hidden="true" />
              <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
            </div>
          ) : null}

          {selectedVersion && selectedGenre ? (
            <Button href={getDownloadLink()} variant="dark" color="brand" className="mt-10 flex items-center space-x-2.5">
              <div>Download</div>
              <DownloadIcon className='h-5 w-5 shrink-0' />
            </Button>
          ) : null}
        </div>
      </div>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" className="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-x-1/2" aria-hidden="true">
        <circle cx={512} cy={512} r={512} fill="url(#8d958450-c69f-4251-94bc-4e091a323369)" fillOpacity="0.7" />
        <defs>
          <radialGradient id="8d958450-c69f-4251-94bc-4e091a323369" cx={0} cy={0} r={1} gradientUnits="userSpaceOnUse" gradientTransform="translate(512 512) rotate(90) scale(512)">
            <stop stopColor="#7775D6" />
            <stop offset={1} stopColor="#7dd3fc" stopOpacity={0} />
          </radialGradient>
        </defs>
      </svg>
    </section>
  )
}
