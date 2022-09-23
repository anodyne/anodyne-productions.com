import { MarketingLayout } from '@/layouts/MarketingLayout'

export default function Custom500() {
    return (
        <h1>500 - Server-side error occurred</h1>
    )
}

Custom500.layoutProps = {
    Layout: MarketingLayout
}