import Card from '@/components/exchange/Card'
import { Container } from '@/components/exchange/Container'
import { ExchangeLayout } from '@/layouts/ExchangeLayout'
import axios from '@/lib/axios'

export default function ExchangeHome({ addons }) {
    return (
        <Container>
            <h1 className="relative mx-auto font-display text-4xl font-medium tracking-tight text-slate-700">Nova Exchange</h1>

            {addons.length > 0 && (
                <ul role="list" className="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
                    {addons.map((addon) => (
                        <Card addon={addon} key={addon.id}></Card>
                    ))}
                </ul>
            )}
        </Container>
    )
}

export async function getStaticProps() {
    const response = await axios.get('/api/addons')

    return {
        props: {
            addons: response.data.data
        }
    }
}

ExchangeHome.layoutProps = {
    Layout: ExchangeLayout,
    PageTitle: 'Nova Exchange by Anodyne Productions'
}
