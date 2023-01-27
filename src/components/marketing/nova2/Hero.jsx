import { Button } from '@/components/marketing/nova2/Button'
import Link from 'next/link'

export function Hero() {
    return (
        <div className="isolate bg-slate-50">
            <div className="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
                <svg className="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" xmlns="http://www.w3.org/2000/svg">
                    <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fillOpacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                    <defs>
                        <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                            <stop stopColor="#9089FC" />
                            <stop offset={1} stopColor="#FF80B5" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>

            <main>
                <div className="relative px-6 lg:px-8">
                    <div className="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
                        <div className="hidden sm:mb-8 sm:flex sm:justify-center">
                            <div className="relative rounded-full py-1 px-3 text-sm leading-6 text-slate-600 ring-1 ring-slate-900/10 hover:ring-slate-900/20">
                                Next generation RPG management is coming.{' '}
                                <Link href="/nova-3" className="font-semibold text-sky-600">
                                    <span className="absolute inset-0" aria-hidden="true" />
                                    Explore Nova 3 <span aria-hidden="true">&rarr;</span>
                                </Link>
                            </div>
                        </div>

                        <div className="text-center">
                            <h1 className="mt-4 relative mx-auto max-w-4xl font-display text-4xl font-medium tracking-tight text-slate-700 sm:text-6xl md:text-7xl">
                                Painless{' '}
                                <span className="relative whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-sky-400">RPG management</span>
                            </h1>

                            <p className="mt-6 mx-auto max-w-2xl text-lg leading-8 text-slate-600">
                                With an easy-to-use interface, integrated posting system, a wide array of developer tools and much more, Nova is all you need to stop managing your game and get back to playing it.
                            </p>

                            <div className="mt-10 flex items-center justify-center gap-x-6">
                                <Button href="#download">
                                    <div className='relative top-px'>
                                        <div>Download now</div>
                                    </div>
                                </Button>
                                <Button href="#features" variant="outline">
                                    <div className='relative top-px'>
                                        <div>Learn more</div>
                                    </div>
                                </Button>
                            </div>
                        </div>
                    </div>

                    <div className="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
                        <svg className="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" xmlns="http://www.w3.org/2000/svg">
                            <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fillOpacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                            <defs>
                                <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#9089FC" />
                                    <stop offset={1} stopColor="#FF80B5" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </main>
        </div>
    )
}
