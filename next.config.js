const withMarkdoc = require('@markdoc/next.js')

/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  pageExtensions: ['page.js', 'jsx', 'md'],
  images: {
    domains: [
      'admin.anodyne-productions.com.test',
      'next-admin.anodyne-productions.com',
      'admin.anodyne-productions.com',
    ],
  },
  experimental: {
    newNextLinkBehavior: true,
    scrollRestoration: true,
  },
}

module.exports = withMarkdoc()(nextConfig)
