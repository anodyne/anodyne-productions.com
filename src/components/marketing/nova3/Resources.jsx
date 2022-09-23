import clsx from 'clsx'
import { Button } from '@/components/marketing/Button'
import { Card } from '@/components/marketing/Card'
import { Container } from '@/components/marketing/Container'

function Resource({ category, title, content, url, buttonText }) {
    return (
        <Card as="article">
            <Card.Title as="h3" href={url}>
                {title}
            </Card.Title>
            <Card.Eyebrow decorate>{category}</Card.Eyebrow>
            <Card.Description>{content}</Card.Description>
            <Card.Cta>{buttonText}</Card.Cta>
        </Card>
    )

    return (
        <section className={clsx('flex flex-col rounded-3xl px-6 sm:px-8 lg:py-8')}>
            <h4 className="mt-5 font-display text-sm text-slate-500 uppercase tracking-wide">{category}</h4>
            <h3 className="mt-1 font-display text-xl text-slate-700">{title}</h3>
            <p className={clsx('mt-2 text-base text-slate-500')}>
                {content}
            </p>

            <Button
                href={url}
                variant="outline"
                color="blue"
                className="mt-8"
                aria-label={`Learn more about ${title}`}
            >
                {buttonText}
            </Button>
        </section>
    )
}

const resources = [
    {
        url: '/docs',
        category: 'Documentation',
        title: 'Learn all about Nova',
        content: "Nova's documentation has been re-written to be clearer and more helpful. We've added all-new sections about getting started, added pages to explain complex features, and dug deeper into the core of Nova to help users understand how to get the most out Nova.",
        buttonText: 'Read more',
    },
    {
        url: 'https://discord.gg/7WmKUks',
        category: 'Community',
        title: 'Join the community',
        content: "Over the years Nova has fostered a global community of artists, developers, and writers who are passionate about the stories they tell. No matter if you're looking to chat with people, find a new game, or get help with Nova, the Anodyne community is ready to welcome you.",
        buttonText: 'Join now',
    },
    {
        url: '/exchange',
        category: 'Add-Ons',
        title: 'Make Nova your own',
        content: "Nova provides incredible flexibility to make your game stand out from others. Whether you're trying to change the way it looks with a brand-new skin or rank set or even update how it works with a MOD, the talented authors on the AnodyneXtras site have you covered.",
        buttonText: 'Explore add-ons',
    },
]

export function Resources() {
    return (
        <section id="resources" aria-label="Resources" className="bg-slate-50 py-20 sm:py-32">
            <Container>
                <div className="md:text-center">
                    <h2 className="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">
                        <span className="relative whitespace-nowrap">Helpful resources</span>
                    </h2>
                </div>

                <ul
                    role="list"
                    className="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3 mt-16"
                >
                    {resources.map((resource, resourceIdx) => (
                        <Resource {...resource} key={resourceIdx} />
                    ))}
                </ul>

                {/* <div className="-mx-4 mt-16 grid max-w-2xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-3 xl:mx-0 xl:gap-x-8">
                    {resources.map((resource, resourceIdx) => (
                        <Resource {...resource} key={resourceIdx} />
                    ))}
                </div> */}
            </Container>
        </section>
    )
}
