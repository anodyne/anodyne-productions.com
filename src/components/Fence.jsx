import { Fragment } from 'react'
import Highlight, { defaultProps } from 'prism-react-renderer'

import Prism from "prism-react-renderer/prism"
(typeof global !== "undefined" ? global : window).Prism = Prism;

require("prismjs/components/prism-apacheconf")
require("prismjs/components/prism-php")
require("prismjs/components/prism-nginx")
require("prismjs/components/prism-yaml")

export function Fence({ children, language }) {
  return (
    <Highlight
      {...defaultProps}
      code={children.trimEnd()}
      language={language}
      theme={undefined}
    >
      {({ className, style, tokens, getTokenProps }) => (
        <pre className={className} style={style}>
          <code>
            {tokens.map((line, lineIndex) => (
              <Fragment key={lineIndex}>
                {line
                  .filter((token) => !token.empty)
                  .map((token, tokenIndex) => (
                    <span key={tokenIndex} {...getTokenProps({ token })} />
                  ))}
                {'\n'}
              </Fragment>
            ))}
          </code>
        </pre>
      )}
    </Highlight>
  )
}