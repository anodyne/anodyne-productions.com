import { Tip, Note, Warning } from '@/components/docs/Callout'
import { Screenshot } from '@/components/docs/Screenshot'
import { QuickLink, QuickLinks } from '@/components/docs/QuickLinks'
import { HeroPattern } from '@/components/docs/HeroPattern'

const tags = {
   note: {
      attributes: {
         title: { type: String }
      },
      render: Note
   },
   warning: {
      attributes: {
         title: { type: String }
      },
      render: Warning
   },
   tip: {
      attributes: {
         title: { type: String }
      },
      render: Tip
   },
   screenshot: {
      attributes: {
         src: { type: String },
         alt: { type: String },
      },
      render: Screenshot,
   },
   figure: {
      selfClosing: true,
      attributes: {
         src: { type: String },
         alt: { type: String },
         caption: { type: String },
      },
      render: ({ src, alt = '', caption }) => (
         <figure>
            {/* eslint-disable-next-line @next/next/no-img-element */}
            <img src={src} alt={alt} />
            <figcaption>{caption}</figcaption>
         </figure>
      ),
   },
   'quick-links': {
      render: QuickLinks,
   },
   'quick-link': {
      selfClosing: true,
      render: QuickLink,
      attributes: {
         title: { type: String },
         description: { type: String },
         icon: { type: String },
         href: { type: String },
      },
   },
   'hero-pattern': {
      selfClosing: true,
      render: HeroPattern
   }
}

export default tags
