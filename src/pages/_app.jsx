import Head from 'next/head'
import { Router, useRouter } from 'next/router'
import { slugifyWithCounter } from '@sindresorhus/slugify'

import { useMobileNavigationStore } from '@/components/docs/MobileNavigation'
import { DocsLayout } from '@/layouts/DocsLayout'
import 'focus-visible'
import '@/styles/tailwind.css'

function getNodeText(node) {
    let text = ''

    for (let child of node.children ?? []) {
        if (typeof child === 'string') {
            text += child
        }

        text += getNodeText(child)
    }

    return text
}

function collectHeadings(nodes, slugify = slugifyWithCounter()) {
    let sections = []

    for (let node of nodes) {
        if (node.name === 'Heading' && node.attributes.level === 2) {
            let title = getNodeText(node)

            if (title) {
                let id = slugify(title)
                node.attributes.id = id

                if (node.name === 'h3') {
                    if (!sections[sections.length - 1]) {
                        throw new Error('Cannot add `h3` to table of contents without a preceding `h2`')
                    }

                    sections[sections.length - 1].children.push({
                        ...node.attributes,
                        title,
                    })
                } else {
                    sections.push({ ...node.attributes, title, children: [] })
                }
            }
        }

        sections.push(...collectHeadings(node.children ?? [], slugify))
    }

    return sections
}

const layouts = {
    docs: DocsLayout
}

function onRouteChange() {
  useMobileNavigationStore.getState().close()
}

Router.events.on('hashChangeStart', onRouteChange)
Router.events.on('routeChangeComplete', onRouteChange)
Router.events.on('routeChangeError', onRouteChange)

export default function App({ Component, pageProps }) {
    const layoutFile = pageProps.markdoc?.frontmatter.layout

    let layoutProps, pageTitle, description

    if (layoutFile === 'docs') {
        layoutProps = {
            title: pageProps.markdoc?.frontmatter.title,
            description: pageProps.markdoc?.frontmatter.description,
            tag: pageProps.markdoc?.frontmatter.tag,
            label: pageProps.markdoc?.frontmatter.label,
            isHomePage: pageProps.markdoc?.frontmatter.homePage,
            sections: pageProps.markdoc?.content ? collectHeadings(pageProps.markdoc.content) : []
        }

        pageTitle = pageProps.markdoc?.frontmatter.pageTitle || `${pageProps.markdoc?.frontmatter.title} - Docs`
        description = pageProps.markdoc?.frontmatter.description
    } else {
        pageTitle = Component.layoutProps.PageTitle
    }

    const Layout = layoutFile ? layouts[layoutFile] : Component.layoutProps.Layout

    return (
        <>
            <Head>
                <title>{pageTitle}</title>
                {description && <meta name="description" content={description} />}
            </Head>
            <Layout {...layoutProps}>
                <Component {...pageProps} />
            </Layout>
        </>
    )
}
