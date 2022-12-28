const withMarkdoc = require('@markdoc/next.js')

/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  pageExtensions: ['page.js', 'jsx', 'md'],
  images: {
    // domains: [
    //   'admin.anodyne-productions.com.test',
    //   'next-admin.anodyne-productions.com',
    //   'admin.anodyne-productions.com',
    // ],
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'tailwindui.com',
        port: '',
        pathname: '/img/ecommerce-images/**'
      }
    ]
  },
  experimental: {
    scrollRestoration: true,
  },
}

module.exports = withMarkdoc()(nextConfig)
