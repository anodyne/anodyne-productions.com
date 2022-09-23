import Image from 'next/future/image'
import { Container } from '@/components/marketing/Container'
import backgroundImage from '@/images/background-features.jpg'
import { Button } from '@/components/marketing/Button'
import { ExternalLinkIcon } from '@/components/icons/flex/ExternalLinkIcon'
import { ArrowRightCircleIcon } from '@/components/icons/flex/ArrowRightCircleIcon'
import Link from 'next/link'
import simCentralImage from '@/images/sponsors/logo_sim_central.svg'
import blackHawkImage from '@/images/sponsors/blackhawklogo.png'
import fifthFleetImage from '@/images/sponsors/fifth_fleet.png'

const sponsors = [
    {
        title: 'Sim Central',
        image: simCentralImage,
        url: 'https://simcentral.org/',
    },
    {
        title: 'USS Black Hawk',
        image: blackHawkImage,
        url: 'https://blackhawk.anurasims.com/',
    },
    {
        title: 'Fifth Fleet',
        image: fifthFleetImage,
        url: 'https://portal.5thfleet.net/',
    },
]

function Sponsor({ title, image, url }) {
    return (
        <li className="group relative rounded-lg p-4 bg-white/10 hover:bg-white/[15%] ring-1 ring-inset ring-white/10 space-y-4 text-center transition">
            <h3 className="font-display text-xl leading-7 text-white">
                {title}
            </h3>

            <Image src={image} alt={title} className="block mx-auto w-auto h-32" />

            <div className='flex items-center justify-center space-x-1.5 text-blue-100 font-medium text-sm'>
                <span>Visit site</span>
                <ExternalLinkIcon className="h-3 w-3" />
            </div>

            <Link href={url} className="absolute inset-0 group-hover:shadow-xl">
                <span></span>
            </Link>
        </li>
    )
}

export function Sponsors() {
    return (
        <section
            id="sponsors"
            aria-labelledby="sponsors-title"
            className="relative overflow-hidden bg-blue-600 py-20 sm:py-32"
        >
            <Image
                className="absolute top-0 max-w-none translate-x-[-30%] -translate-y-1/4"
                src={backgroundImage}
                alt=""
                width={1558}
                height={946}
                unoptimized
            />

            <Container className="relative">
                <div className="mx-auto max-w-2xl lg:mx-0">
                    <h2
                        id="sponsors-title"
                        className="font-display text-3xl tracking-tight text-white sm:text-4xl"
                    >
                        Thanks to our incredible sponsors
                    </h2>

                    <p className="mt-4 text-lg tracking-tight text-blue-100">
                        We&rsquo;ve launched a Patreon as a way for people to support Anodyne and help us continue to provide Nova and all of its resources to the community for free. As a patron, you&rsquo;ll have access to a private Discord community, early access to Nova 3, and more. Join today!
                    </p>

                    <Button href="https://www.patreon.com/anodyneproductions" color="slate" className="mt-6">
                        <div className="flex items-center space-x-2.5">
                            <div className='relative top-px'>
                                <div>Become a patron</div>
                            </div>
                            <ArrowRightCircleIcon className="h-5 w-5" />
                        </div>
                    </Button>
                </div>

                <ul role="list" className="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                    {sponsors.map((sponsor, sponsorIdx) => (
                        <Sponsor {...sponsor} key={sponsorIdx} />
                    ))}
                </ul>
            </Container>
        </section>
    )
}
