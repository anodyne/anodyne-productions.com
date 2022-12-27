import { Callout } from "./Callout";

export function Note({ title, children }) {
  return (
    <Callout title={title} type="note">
        {children}
    </Callout>
  )
}