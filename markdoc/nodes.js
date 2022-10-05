import { Fence } from '@/components/Fence'
import Markdoc, { nodes as defaultNodes } from '@markdoc/markdoc'
import { torchlight, Block } from '@torchlight-api/torchlight-cli'

const nodes = {
  document: {
    render: undefined,
  },
  th: {
    ...defaultNodes.th,
    attributes: {
      ...defaultNodes.th.attributes,
      scope: {
        type: String,
        default: 'col',
      },
    },
  },
  fence: {
    render: Fence,
    attributes: {
      content: { type: String, render: false, required: true },
      language: { type: String, render: 'data-language' },
      process: { type: Boolean, render: false, default: true },
    },
    async transform(node, config) {
      const attributes = node.transformAttributes(config)
      const children = node.children.length
        ? node.transformChildren(config)
        : [node.attributes.content]

      torchlight.init({
        theme: 'material-theme-palenight',
        options: {
          lineNumbers: true,
          diffIndicators: true,
          diffIndicatorsInPlaceOfLineNumbers: true,
        }
      })

      const block = new Block({
          language: node.attributes.language,
          code: node.attributes.content
      })

      const { classes, highlighted, language, styles } = (await torchlight.highlight([block]))[0]

      return Markdoc.createElement('Fence', {
        ...attributes,
        className: classes,
        style: styles
      }, highlighted)
    }
  },
}

export default nodes
