import { LightMarketingLayout } from '@/layouts/LightMarketingLayout'
import { Header } from '@/components/marketing/nova2/Header'
import { Hero } from '@/components/marketing/nova2/Hero'
import { Features } from '@/components/marketing/nova2/Features'
import { Download } from '@/components/marketing/nova2/Download'
import { Resources } from '@/components/marketing/nova2/Resources'
import { Sponsors } from '@/components/marketing/nova2/Sponsors'
import { Footer } from '@/components/marketing/nova2/Footer'
import axios from '@/lib/axios'

export default function Home({ sponsors, latestVersion }) {
    return (
        <>
            <Header />
            <Hero />
            <Features />
            <Download latestVersion={latestVersion} />
            <Resources />
            <Sponsors sponsors={sponsors} />
            <Footer />
        </>
    )
}

export async function getStaticProps() {
    const sponsors = await axios.get('/api/sponsors/premium')
    const latestVersion = await axios.get('/api/nova/latest-version')

    return {
        props: {
            sponsors: sponsors.data.data,
            latestVersion: latestVersion.data.version,
        }
    }
}

Home.layoutProps = {
    Layout: LightMarketingLayout,
    PageTitle: 'Nova by Anodyne Productions'
}
