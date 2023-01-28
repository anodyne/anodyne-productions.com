import Image from 'next/image'
import { Button } from '@/components/marketing/Button'
import { Container } from '@/components/marketing/Container'
import backgroundImage from '@/images/bg-blur-hero.svg'

export function Hero() {
    return (
        <div className="isolate bg-slate-900">
            <svg
        className="absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]"
        aria-hidden="true"
      >
        <defs>
          <pattern
            id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc"
            width={200}
            height={200}
            x="50%"
            y={-1}
            patternUnits="userSpaceOnUse"
          >
            <path d="M.5 200V.5H200" fill="none" />
          </pattern>
        </defs>
        <svg x="50%" y={-1} className="overflow-visible fill-slate-800/20">
          <path
            d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z"
            strokeWidth={0}
          />
        </svg>
        <rect width="100%" height="100%" strokeWidth={0} fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
      </svg>
      <svg
        viewBox="0 0 1108 632"
        aria-hidden="true"
        className="absolute top-10 left-[calc(50%-4rem)] -z-10 w-[69.25rem] max-w-none transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]"
      >
        <path
          fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)"
          fillOpacity=".2"
          d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z"
        />
        <defs>
          <linearGradient
            id="175c433f-44f6-4d59-93f0-c5c51ad5566d"
            x1="1220.59"
            x2="-85.053"
            y1="432.766"
            y2="638.714"
            gradientUnits="userSpaceOnUse"
          >
            <stop stopColor="#4F46E5" />
            <stop offset={1} stopColor="#80CAFF" />
          </linearGradient>
        </defs>
      </svg>
      {/* <div className="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
        <svg
          className="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
          viewBox="0 0 1155 678"
        >
          <path
            fill="url(#f4773080-2a16-4ab4-9fd7-579fec69a4f7)"
            fillOpacity=".2"
            d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"
          />
          <defs>
            <linearGradient
              id="f4773080-2a16-4ab4-9fd7-579fec69a4f7"
              x1="1155.49"
              x2="-78.208"
              y1=".177"
              y2="474.645"
              gradientUnits="userSpaceOnUse"
            >
              <stop stopColor="#9089FC" />
              <stop offset={1} stopColor="#FF80B5" />
            </linearGradient>
          </defs>
        </svg>
      </div> */}
      <main>
        <div className="relative py-24 sm:py-32 lg:pb-40">
          <div className="mx-auto max-w-7xl px-6 lg:px-8">
            <div className="mx-auto max-w-2xl text-center">
              <h1 className="mt-4 relative mx-auto max-w-4xl font-display text-4xl font-medium tracking-tight text-white sm:text-6xl md:text-7xl">
                Nova 3:{' '}
                <span className="relative whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-sky-400">The Next Generation</span>
            </h1>
              <p className="mt-6 text-lg leading-8 text-slate-300">
                Re-written from the ground up, Nova 3 is the culmination of years of re-thinking the way stories can be told and RPGs should be managed. Say hello to the next generation.
              </p>
              <div className="mt-10 flex items-center justify-center gap-x-6">
                {/* <a
                  href="#"
                  className="rounded-md bg-sky-500 px-3.5 py-1.5 text-base font-semibold leading-7 text-white shadow-sm hover:bg-sky-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-sky-400"
                >
                  Get started
                </a> */}
                <a href="#" className="text-base font-semibold leading-7 text-white">
                  Learn more <span aria-hidden="true">→</span>
                </a>
              </div>
            </div>
            <img
              src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png"
              alt="App screenshot"
              width={2432}
              height={1442}
              className="mt-16 rounded-md bg-white/5 shadow-2xl ring-1 ring-white/10 sm:mt-24"
            />
          </div>
          <div className="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <svg
              className="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]"
              viewBox="0 0 1155 678"
            >
              <path
                fill="url(#ee0717bf-3e43-49df-b1bd-de36422ed3d3)"
                fillOpacity=".2"
                d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z"
              />
              <defs>
                <linearGradient
                  id="ee0717bf-3e43-49df-b1bd-de36422ed3d3"
                  x1="1155.49"
                  x2="-78.208"
                  y1=".177"
                  y2="474.645"
                  gradientUnits="userSpaceOnUse"
                >
                  <stop stopColor="#9089FC" />
                  <stop offset={1} stopColor="#FF80B5" />
                </linearGradient>
              </defs>
            </svg>
          </div>
        </div>
      </main>
    </div>
        // <Container className="pt-20 pb-16 text-center lg:pt-32 bg-slate-50 dark:bg-slate-900">
        //     <Image
        //         className="hidden md:block absolute top-0 left-1/2 max-w-none translate-x-[-30%] -translate-y-1/4 opacity-30 dark:opacity-50"
        //         src={backgroundImage}
        //         alt=""
        //         width={1558}
        //         height={946}
        //         unoptimized
        //     />

        //     <h1 className="mt-4 relative mx-auto max-w-4xl font-display text-4xl font-medium tracking-tight text-slate-700 dark:text-white sm:text-6xl md:text-7xl">
        //         Nova 3:{' '}
        //         <span className="relative whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-sky-400">The Next Generation</span>
        //     </h1>

        //     <p className="relative mx-auto mt-6 max-w-2xl text-lg tracking-tight text-slate-700 dark:text-white/60">
        //         Re-written from the ground up, Nova 3 is the culmination of years of re-thinking the way stories can be told and RPGs should be managed. Say hello to the next generation.
        //     </p>

        //     <div className="relative mt-10 flex justify-center gap-x-6">
        //         <Button href="#download">
        //             <div className='relative top-px'>
        //                 <div>Download now</div>
        //             </div>
        //         </Button>
        //         <Button href="#features" variant="outline">
        //             <div className='relative top-px'>
        //                 <div>Learn more</div>
        //             </div>
        //         </Button>
        //     </div>
        // </Container>
    )
}