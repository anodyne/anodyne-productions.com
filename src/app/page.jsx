import { Header } from '@/components/marketing/nova2/Header'
import { Features } from '@/components/marketing/nova2/Features'
import { Download } from '@/components/marketing/nova2/Download'
import { Resources } from '@/components/marketing/nova2/Resources'
import { Sponsors } from '@/components/marketing/nova2/Sponsors'
import { Footer } from '@/components/marketing/Footer'

async function getSponsors() {
  const response = await fetch(process.env.NEXT_PUBLIC_API_URL + '/sponsors/premium', {
    cache: 'no-store'
  })
  const sponsors = response.json()

  return sponsors
}

async function getLatestNovaVersion() {
  const response = await fetch(process.env.NEXT_PUBLIC_API_URL + '/nova/latest-version', {
    cache: 'no-store'
  })
  const latestVersion = response.json()

  return latestVersion
}

const footerNavItems = [
  { name: 'Features', href: '#features' },
  { name: 'Download', href: '#download' },
  { name: 'Docs', href: "/docs/" + process.env.NEXT_PUBLIC_DOCS_CURRENT_VERSION + "/introduction" },
  { name: 'Resources', href: '#resources' },
  { name: 'Get Help', href: 'https://discord.gg/7WmKUks' },
  { name: 'Nova 3', href: '/nova-3' },
]

export default async function Page() {
  const sponsors = await getSponsors().then(res => res.data)
  const latestVersion = await getLatestNovaVersion().then(res => res.version)

  return (
    <>
      <Header />
      <Features />
      <Download latestVersion={latestVersion} />
      <Resources />
      <Sponsors sponsors={sponsors} />
      <Footer items={footerNavItems} dark={false} />
    </>
  )
}