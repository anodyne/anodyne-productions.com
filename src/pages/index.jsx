import { MarketingLayout } from '@/layouts/MarketingLayout'
import { Header } from '@/components/marketing/nova2/Header'
import { Hero } from '@/components/marketing/nova2/Hero'
import { Features } from '@/components/marketing/nova2/Features'
import { Download } from '@/components/marketing/nova2/Download'
import { Resources } from '@/components/marketing/nova2/Resources'
import { Sponsors } from '@/components/marketing/nova2/Sponsors'
import { Footer } from '@/components/marketing/nova2/Footer'

export default function Home() {
    return (
        <>
            <Header />
            <Hero />
            {/* <Features /> */}
            <Download />
            <Resources />
            <Sponsors />
            <Footer />
        </>
    )
}

Home.layoutProps = {
    Layout: MarketingLayout
}
