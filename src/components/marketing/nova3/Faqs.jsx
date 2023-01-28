import { Disclosure } from '@headlessui/react'
import { MinusSmallIcon, PlusSmallIcon } from '@heroicons/react/24/outline'

const faqs = [
  {
    id: 1,
    question: 'When will Nova 3 be released?',
    answer: "There is no timeframe right now. Our goal is to continue building Nova 3 until we feel that it's rock solid and ready for use with a wide range of games.",
  },
  {
    id: 2,
    question: 'Will I be able to use my existing skins and MODs in Nova 3?',
    answer: "No. The format for themes and extensions in Nova 3 is completely different from Nova 2. All add-ons for Nova 3 will have to be written from scratch.",
  },
  {
    id: 3,
    question: 'Where can I download Nova 3?',
    answer: "At the moment, we do not offer a download of the work that's been done on Nova 3. People who support Anodyne through our Patreon are given early access to a downloadable copy of Nova 3 that is updated regularly as an exclusive benefit of their support. The wider community will be given access to alpha and beta milestones in the future.",
  },
  {
    id: 4,
    question: "I've heard the term Nova NextGen used a lot. Is Nova 3 the same thing or something different?",
    answer: "Yes. Several years ago there were a lot of discussions around Nova 3 and what it would be, but over time, those ideas evolved significantly. To avoid confusion between what had been discussed previously and what was actually being worked on, we chose to use the term \"Nova NextGen\" to differentiate the ideas. For all intents and purposes, Nova 3 and Nova NextGen can now be used interchangeably.",
  },
  {
    id: 5,
    question: 'Will I be able to migrate my Nova 2 site to Nova 3?',
    answer: "Like the transition from Nova 1 to Nova 2, we'll build scripts to migrate Nova 2 sites to Nova 3. Given the huge changes coming in Nova 3 though, there will be certain things we won't be able to migrate from Nova 2. More information about those items and the migration process will be available at a later date.",
  },
]

export function Faqs() {
  return (
    <section
      id="faq"
      aria-labelledby="faq-title"
      className="bg-slate-900"
    >
      <div className="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:py-40 lg:px-8">
        <div className="mx-auto max-w-4xl divide-y divide-white/10">
          <h2 className="text-2xl font-bold leading-10 tracking-tight text-white">Frequently asked questions</h2>
          <dl className="mt-10 space-y-6 divide-y divide-white/10">
            {faqs.map((faq, index) => (
              <Disclosure as="div" key={faq.question} defaultOpen={index === 0} className="pt-6">
                {({ open }) => (
                  <>
                    <dt>
                      <Disclosure.Button className="flex w-full items-start justify-between text-left text-white">
                        <span className="text-base font-semibold leading-7">{faq.question}</span>
                        <span className="ml-6 flex h-7 items-center">
                          {open ? (
                            <PlusSmallIcon className="h-6 w-6" aria-hidden="true" />
                          ) : (
                            <MinusSmallIcon className="h-6 w-6" aria-hidden="true" />
                          )}
                        </span>
                      </Disclosure.Button>
                    </dt>
                    <Disclosure.Panel as="dd" className="mt-2 pr-12">
                      <p className="text-base leading-7 text-slate-300">{faq.answer}</p>
                    </Disclosure.Panel>
                  </>
                )}
              </Disclosure>
            ))}
          </dl>
        </div>
      </div>
    </section>
  )
}
