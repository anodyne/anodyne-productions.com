import { LightMarketingLayout } from '@/layouts/LightMarketingLayout'
import { Header } from '@/components/marketing/nova3/Header'
import { Faqs } from '@/components/marketing/nova3/Faqs'
import { Footer } from '@/components/marketing/Footer'
import { Demo } from '@/components/marketing/nova3/Demo'

const footerNavItems = [
  { name: 'Features', href: '#features' },
  { name: 'Demo', href: '#demo' },
  { name: 'Docs', href: '/docs/3.0/introduction' },
  { name: 'FAQs', href: '#faq' },
  { name: 'Get Help', href: 'https://discord.gg/7WmKUks' },
  { name: 'Nova 2', href: '/' },
]

export default function Nova3() {
  return (
    <>
      <Header />
      <Demo />
      <Faqs />
      <Footer items={footerNavItems} dark={true} />
    </>
  )
}

Nova3.layoutProps = {
  Layout: LightMarketingLayout,
  PageTitle: 'Nova 3 by Anodyne Productions'
}
