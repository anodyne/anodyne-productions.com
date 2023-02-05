'use client'

import Link from 'next/link'

import { Button } from '@/components/marketing/Button'
import { Navigation } from '@/components/marketing/Navigation'

const navItems = [
  { href: '#features', title: 'Features' },
  { href: '#download', title: 'Download' },
  { href: "/docs/" + process.env.NEXT_PUBLIC_DOCS_CURRENT_VERSION + "/introduction", title: 'Docs' },
  { href: '#resources', title: 'Resources' },
  { href: 'https://discord.gg/7WmKUks', title: 'Get Help' },
]

export function Header() {
  return (
    <header className="relative">
      <div className="px-4 sm:px-6 md:px-8">
        <div className="isolate bg-slate-50 z-10">
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

          <svg className="absolute inset-0 -z-10 h-full w-full stroke-purple-700/15 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
            <defs>
              <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width={200} height={200} x="50%" y={-1} patternUnits="userSpaceOnUse">
                <path d="M.5 200V.5H200" fill="none" />
              </pattern>
            </defs>

            <svg x="50%" y={-1} className="overflow-visible fill-purple-200/20">
              <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" strokeWidth={0} />
            </svg>
            <rect width="100%" height="100%" strokeWidth={0} fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
          </svg>
        </div>

        <Navigation items={navItems} dark={false} />

        <div className="relative px-6 lg:px-8">
          <div className="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
            <div className="hidden sm:mb-8 sm:flex sm:justify-center">
              <Link href="/nova-3" className="group inline-flex items-center rounded-full font-medium space-x-3 px-3.5 py-0.5 bg-purple-200/60 text-purple-700 text-sm hover:bg-purple-200 hover:text-purple-800 transition">
                <div className="shrink-0 inline-flex items-center -ml-2.5">
                  <div className="inline-flex items-center bg-purple-50 rounded-full px-2.5">Nova 3</div>
                </div>
                <span className="inline-flex items-center">Explore Nova&rsquo;s next generation <span className="text-base ml-1.5 text-purple-500 group-hover:text-purple-700 font-semibold transition">&rarr;</span></span>
              </Link>
            </div>

            <div className="text-center">
              <h1 className="mt-4 relative mx-auto max-w-4xl text-4xl font-extrabold tracking-tight text-slate-700 sm:text-6xl md:text-7xl">
                <span className="before:block before:absolute before:rounded-xl before:-inset-1 before:-skew-y-3 before:bg-gradient-to-r before:from-purple-500 before:to-sky-400 relative inline-block px-2 py-1.5">
                  <span className="relative text-white">Painless{' '}</span>
                </span>
                <span className="relative whitespace-nowrap">RPG management</span>
              </h1>

              <p className="mt-6 mx-auto max-w-2xl text-lg leading-8 text-slate-600">
                With an easy-to-use interface, integrated posting system, a wide array of developer tools and much more, Nova is all you need to stop managing your game and get back to playing it.
              </p>

              <div className="mt-10 flex items-center justify-center gap-x-6">
                <Button href="#download" variant="light" color="primary">
                  Download now
                </Button>
                <Button href="#features" variant="light" color="secondary">
                  Learn more
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
      </div>
    </header>
  )
}
