import { LightMarketingLayout } from '@/layouts/LightMarketingLayout'
import { Header } from '@/components/marketing/nova2/Header'
import { Hero } from '@/components/marketing/nova2/Hero'
import { Features } from '@/components/marketing/nova2/Features'
import { Download } from '@/components/marketing/nova2/Download'
import { Resources } from '@/components/marketing/nova2/Resources'
import { Sponsors } from '@/components/marketing/nova2/Sponsors'
import { Footer } from '@/components/marketing/nova2/Footer'
import axios from '@/lib/axios'

export default function Home({ sponsors }) {
    return (
        <>
            <Header />
            <Hero />
            <Features />
            <Download />
            <Resources />
            <Sponsors sponsors={sponsors} />
            <Footer />
        </>
    )
}

export async function getStaticProps() {
    const response = await axios.get('/api/sponsors/premium')

    return {
        props: {
            sponsors: response.data.data
        }
    }
}

Home.layoutProps = {
    Layout: LightMarketingLayout,
    PageTitle: 'Nova by Anodyne Productions'
}
