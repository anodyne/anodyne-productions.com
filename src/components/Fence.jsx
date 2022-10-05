export function Fence({ children, className}) {
  return (
    <pre>
      <code className={className} dangerouslySetInnerHTML={{ __html: children }}></code>
    </pre>
  )
}
