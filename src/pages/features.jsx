import { Container } from "@/components/marketing/Container";
import { Footer } from "@/components/marketing/nova3/Footer";
import { Header } from "@/components/marketing/nova3/Header";
import { Hero } from "@/components/marketing/nova3/Hero";
import { MarketingLayout } from "@/layouts/MarketingLayout";

const features = [
   {
      name: 'Stories',
      intro: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus distinctio in voluptatum quis a consequatur nihil aut tempora? Necessitatibus nulla voluptatibus provident fugiat similique perspiciatis quia. Laboriosam dolores omnis qui?",
      items: [
         {
            icon: '',
            title: 'Chronological context',
            content: "Stories live on a timeline, giving readers the chance to experience your game's adventures in exactly the order you intend them."
         },
         {
            icon: function ShuffleIcon() {
               return (
                  <>
                     <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M1.00464 4H1.85921C3.19663 4 4.44555 4.6684 5.18741 5.7812L6.81248 8.2188C7.55435 9.3316 8.80327 10 10.1407 10H13.1718" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M13.1641 4.0048H10.1564C9.37835 4.0048 8.63074 4.30708 8.07133 4.84784L7.80005 5.11008" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M1.00464 10L1.8416 10C2.71529 10 3.56494 9.71395 4.26074 9.18556L4.40788 9.07382" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M11.4934 11.6787C12.2299 11.0752 12.598 10.7073 13.1721 10C12.598 9.2927 12.2299 8.92475 11.4934 8.32131" /><path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" d="M11.4934 5.67868C12.2299 5.07524 12.598 4.7073 13.1721 4C12.598 3.2927 12.2299 2.92475 11.4934 2.32131" />
                  </>
               )
            },
            title: 'Non-linear storytelling',
            content: "Add stories and posts in whatever order you want to ensure chronological integrity. You can even add stories inside of other stories."
         },
         { icon: '', title: 'Post types', content: "Create different ways for players to contribute through post types with fine-tuned control over a host of options for any post of that type." },
         { icon: '', title: 'Four', content: '' },
         { icon: '', title: 'Five', content: '' },
         { icon: '', title: 'Six', content: '' },
      ]
   },
   {
      name: 'Ranks',
      intro: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus distinctio in voluptatum quis a consequatur nihil aut tempora? Necessitatibus nulla voluptatibus provident fugiat similique perspiciatis quia. Laboriosam dolores omnis qui?",
      items: [
         { icon: '', title: 'One', content: '' },
         { icon: '', title: 'Two', content: '' },
         { icon: '', title: 'Three', content: '' },
         { icon: '', title: 'Four', content: '' },
         { icon: '', title: 'Five', content: '' },
         { icon: '', title: 'Six', content: '' },
      ]
   },
   {
      name: 'Mobile',
      intro: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus distinctio in voluptatum quis a consequatur nihil aut tempora? Necessitatibus nulla voluptatibus provident fugiat similique perspiciatis quia. Laboriosam dolores omnis qui?",
      items: [
         { icon: '', title: 'One', content: '' },
         { icon: '', title: 'Two', content: '' },
         { icon: '', title: 'Three', content: '' },
         { icon: '', title: 'Four', content: '' },
         { icon: '', title: 'Five', content: '' },
         { icon: '', title: 'Six', content: '' },
      ]
   },
]

function FeatureOverview({ name, intro, items }) {
   return (
      <Container>
         <div className="py-16 md:py-24">
            <div className="mx-auto max-w-2xl">
               <h2 className="font-display font-medium text-3xl sm:text-4xl text-slate-700 dark:text-white">
                  {name}
               </h2>
               <p className="text-slate-500 dark:text-slate-400 text-xl">
                  {intro}
               </p>
            </div>
            <div className="mx-auto max-w-5xl">
               <div className="grid grid-cols-3 gap-3 mt-16">
                  {items.map((item) => (
                     <div className="rounded-lg bg-slate-800/50 ring-1 ring-white/10 text-slate-400 py-4 px-6" key={item.title}>
                        <svg
                           xmlns="http://www.w3.org/2000/svg"
                           fill="none"
                           viewBox="0 0 14 14"
                           className="h-6 w-6 text-white"
                        >
                           {item.icon}
                        </svg>
                        <h4 className="font-display font-normal text-lg text-white">{item.title}</h4>
                        <p className="text-sm">{item.content}</p>
                     </div>
                  ))}
               </div>
            </div>
         </div>
      </Container>
   )
}

export default function Features() {
   return (
      <>
         <Header />
         <Hero />

         <div>
            {features.map((feature) => (
               <>
                  <hr className="mx-auto max-w-3xl border-slate-400 dark:border-slate-700" />
                  <FeatureOverview {...feature} key={feature.name} />
               </>
            ))}
         </div>

         <Footer />
      </>
   )
}

Features.layoutProps = {
   Layout: MarketingLayout,
   PageTitle: 'Features - Nova by Anodyne Productions'
}