import Image from 'next/future/image'
import { Fragment, useState } from 'react'
import { Listbox, Transition } from '@headlessui/react'
import { Float } from '@headlessui-float/react'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/react/24/solid'
import { DownloadIcon } from '@/components/icons/flex/DownloadIcon'
import { AlertCircleIcon } from '@/components/icons/flex/AlertCircleIcon'
import { Button } from '@/components/marketing/Button'
import { Container } from '@/components/marketing/Container'
import backgroundImage from '@/images/background-call-to-action.jpg'

const versions = [
    { name: '2.7', value: '2.7.0' },
    { name: '2.6.2 (Legacy - PHP 5.6)', value: '2.6.2' },
    { name: '2.3.2 (Legacy - PHP 5.2)', value: '2.3.2' },
]

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

export function Download() {
    const [selectedVersion, setSelectedVersion] = useState(versions[0])
    const [selectedGenre, setSelectedGenre] = useState()

    function getDownloadLink() {
        return `nova-${selectedVersion.value}-${selectedGenre.value}.zip`
    }

    return (
        <section id="download" className="relative overflow-hidden bg-sky-600 py-32">
            <Image
                className="absolute top-1/2 left-1/2 max-w-none -translate-x-1/2 -translate-y-1/2"
                src={backgroundImage}
                alt=""
                width={2347}
                height={1244}
                unoptimized
            />

            <Container className="relative">
                <div className="mx-auto max-w-lg text-center">
                    <h2 className="font-display text-3xl tracking-tight text-white sm:text-4xl">
                        Ready to get started?
                    </h2>

                    <h2 className="font-display text-3xl tracking-tight text-sky-900 sm:text-4xl font-medium">
                        Download Nova today.
                    </h2>

                    <div className="relative grid grid-cols-2 gap-8 text-left mt-6">
                        <Listbox value={selectedVersion} onChange={setSelectedVersion}>
                            <div className="relative">
                                <Listbox.Label className="font-medium text-white/75 text-sm">Version</Listbox.Label>

                                <Float offset={4} portal>
                                    <Listbox.Button className="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
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
                                    <Listbox.Button className="relative w-full cursor-default rounded-lg bg-white mt-1 py-2 pl-3 pr-10 text-left shadow-md focus:outline-none focus-visible:border-indigo-500 focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-orange-300 sm:text-sm">
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
                            <AlertCircleIcon className="h-8 w-8 text-sky-200 shrink-0" aria-hidden="true" />
                            <span>Nova 2.6.2 is legacy software and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
                        </div>
                    ) : null}

                    {selectedVersion.value.includes('2.3') ? (
                        <div className="mt-8 flex space-x-3 text-white font-medium text-sm leading-6 text-left">
                            <AlertCircleIcon className="h-8 w-8 text-sky-200 shrink-0" aria-hidden="true" />
                            <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
                        </div>
                    ) : null}

                    {selectedVersion && selectedGenre ? (
                        <Button href={getDownloadLink()} color="slate" className="mt-10 flex items-center space-x-2.5">
                            <div className='relative top-px'>
                                <div>Download</div>
                            </div>
                            <DownloadIcon className='h-5 w-5 shrink-0' />
                        </Button>
                    ) : null}
                </div>
            </Container>
        </section>
    )
}
