import Image from 'next/future/image'
import { Button } from '@/components/marketing/Button'
import { Container } from '@/components/marketing/Container'
import backgroundImage from '@/images/background-faqs.jpg'

export function Hero() {
    return (
        <Container className="pt-20 pb-16 text-center lg:pt-32 bg-slate-50">
            <Image
                className="hidden md:block absolute top-0 left-1/2 max-w-none translate-x-[-30%] -translate-y-1/4"
                src={backgroundImage}
                alt=""
                width={1558}
                height={946}
                unoptimized
            />

            <h1 className="mt-4 relative mx-auto max-w-4xl font-display text-4xl font-medium tracking-tight text-slate-700 sm:text-6xl md:text-7xl">
                Painless{' '}
                <span className="relative whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-sky-400">RPG management</span>
            </h1>

            <p className="relative mx-auto mt-6 max-w-2xl text-lg tracking-tight text-slate-700">
                With an easy-to-use interface, integrated posting system, a wide array of developer tools and much more, Nova is all you need to stop managing your game and get back to playing it.
            </p>

            <div className="relative mt-10 flex justify-center gap-x-6">
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
        </Container>
    )
}