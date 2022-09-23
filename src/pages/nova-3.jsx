import { MarketingLayout } from '@/layouts/MarketingLayout'
import { Header } from '@/components/marketing/nova3/Header'
import { Hero } from '@/components/marketing/nova3/Hero'
import { Features } from '@/components/marketing/nova3/Features'
import { Download } from '@/components/marketing/nova3/Download'
import { Faqs } from '@/components/marketing/nova3/Faqs'
import { Footer } from '@/components/marketing/nova3/Footer'
import { PrimaryFeatures } from '@/components/marketing/nova3/PrimaryFeatures'

export default function Nova3() {
    return (
        <>
            <Header />
            <Hero />
            <PrimaryFeatures />
            <Features />
            <Faqs />
            <Footer />
        </>
    )
}

Nova3.layoutProps = {
    Layout: MarketingLayout
}
