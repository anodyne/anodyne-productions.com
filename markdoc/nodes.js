import { Heading } from '@/components/docs/Heading'
import { Fence } from '@/components/Fence'
import Markdoc, { nodes as defaultNodes, Tag } from '@markdoc/markdoc'
import { torchlight, Block } from '@torchlight-api/torchlight-cli'

function generateID(children, attributes) {
  if (attributes.id && typeof attributes.id === 'string') {
    return attributes.id;
  }
  return children
    .filter((child) => typeof child === 'string')
    .join(' ')
    .replace(/[?]/g, '')
    .replace(/\s+/g, '-')
    .toLowerCase();
}

const nodes = {
   document: {
      render: undefined,
   },
   heading: {
      render: Heading,
      children: ['inline'],
      attributes: {
         id: { type: String },
         level: { type: Number, required: true, default: 1 },
         className: { type: String },
         tag: { type: String },
         label: { type: String },
         anchor: { type: Boolean, default: true }
      },
      transform(node, config) {
         const attributes = node.transformAttributes(config);
         const children = node.transformChildren(config);
         const id = generateID(children, attributes);

         return new Tag(this.render, { ...attributes, id }, children);
      }
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
               lineNumbers: false,
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
