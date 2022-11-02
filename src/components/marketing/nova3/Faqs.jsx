import Image from 'next/image'

import { Container } from '@/components/marketing/Container'
import backgroundImage from '@/images/background-faqs.jpg'

const faqs = [
  [
    {
      question: 'When will Nova 3 be released?',
      answer: "There is no timeframe right now. Our goal is to continue building Nova 3 until we feel that it's rock solid and ready for use with a wide range of games.",
    },
    {
      question: 'Will I be able to use my existing skins and MODs in Nova 3?',
      answer: "No. The format for themes and extensions in Nova 3 is completely different from Nova 2. All add-ons for Nova 3 will have to be written from scratch.",
    },
  ],
  [
    {
      question: 'Where can I download Nova 3?',
      answer: "At the moment, we do not offer a download of the work that's been done on Nova 3. People who support Anodyne through our Patreon are given early access to a downloadable copy of Nova 3 that is updated regularly as an exclusive benefit of their support. The wider community will be given access to alpha and beta milestones in the future.",
    },
    {
      question: "I've heard the term Nova NextGen used a lot. Is Nova 3 the same thing or something different?",
      answer: "Yes. Several years ago there were a lot of discussions around Nova 3 and what it would be, but over time, those ideas evolved significantly. To avoid confusion between what had been discussed previously and what was actually being worked on, we chose to use the term \"Nova NextGen\" to differentiate the ideas. For all intents and purposes, Nova 3 and Nova NextGen can now be used interchangeably.",
    },
  ],
  [
    {
      question: 'Will I be able to migrate my Nova 2 site to Nova 3?',
      answer: "Like the transition from Nova 1 to Nova 2, we'll build scripts to migrate Nova 2 sites to Nova 3. Given the huge changes coming in Nova 3 though, there will be certain things we won't be able to migrate from Nova 2. More information about those items and the migration process will be available at a later date.",
    },
  ],
]

export function Faqs() {
  return (
    <section
      id="faq"
      aria-labelledby="faq-title"
      className="relative overflow-hidden bg-gradient-to-br from-slate-600 to-slate-800 py-20 sm:py-32"
    >
      {/* <Image
        className="absolute top-0 left-1/2 max-w-none translate-x-[-30%] -translate-y-1/4"
        src={backgroundImage}
        alt=""
        width={1558}
        height={946}
        unoptimized
      /> */}
      <Container className="relative">
        <div className="mx-auto max-w-2xl lg:mx-0">
          <h2
            id="faq-title"
            className="font-display text-3xl tracking-tight text-white sm:text-4xl"
          >
            Frequently asked questions
          </h2>
          {/* <p className="mt-4 text-lg tracking-tight text-slate-700">
            If you can’t find what you’re looking for, email our support team
            and if you’re lucky someone will get back to you.
          </p> */}
        </div>
        <ul
          role="list"
          className="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3"
        >
          {faqs.map((column, columnIndex) => (
            <li key={columnIndex}>
              <ul role="list" className="flex flex-col gap-y-8">
                {column.map((faq, faqIndex) => (
                  <li key={faqIndex}>
                    <h3 className="font-display text-lg leading-7 text-slate-200">
                      {faq.question}
                    </h3>
                    <p className="mt-4 text-sm text-slate-400">{faq.answer}</p>
                  </li>
                ))}
              </ul>
            </li>
          ))}
        </ul>
      </Container>
    </section>
  )
}
