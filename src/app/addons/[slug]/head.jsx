async function getAddon(slug) {
  const response = await fetch(process.env.NEXT_PUBLIC_API_URL + '/addons/' + slug + '/show', {
    cache: 'no-store'
  })
  const addon = response.json()

  return addon
}

export default async function Head({ params }) {
  const addon = await getAddon(params.slug).then(res => res.data)

  return (
    <>
      <title>{`${addon.name} &bull; Nova Add-ons`}</title>
    </>
  )
}