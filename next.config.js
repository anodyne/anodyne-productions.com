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
        pathname: '/img/ecommerce-images/**'
      },
      {
        protocol: 'http',
        hostname: 'admin.anodyne-productions.com.test',
        pathname: '/storage/*/**'
      },
      {
        protocol: 'https',
        hostname: 'next-admin.anodyne-productions.com',
        pathname: '/storage/*/**'
      },
      {
        protocol: 'https',
        hostname: 'admin.anodyne-productions.com',
        pathname: '/storage/*/**'
      },
      {
        protocol: 'https',
        hostname: 'ui-avatars.com',
        pathname: '/api/**'
      }
    ]
  },
  experimental: {
    scrollRestoration: true,
  },
}

module.exports = withMarkdoc()(nextConfig)
