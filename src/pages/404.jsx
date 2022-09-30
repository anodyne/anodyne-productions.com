import { LightMarketingLayout } from '@/layouts/LightMarketingLayout'

export default function Custom404() {
    return (
        <h1>404 - Page Not Found</h1>
    )
}

Custom404.layoutProps = {
    Layout: LightMarketingLayout,
    PageTitle: '404 Not Found'
}