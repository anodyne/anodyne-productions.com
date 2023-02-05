import Header from "./Header";

export default function AddonsLayout({ children }) {
  return (
    <>
      <Header />

      <main className="mx-auto max-w-2xl px-4 lg:max-w-8xl lg:px-8">
        {children}
      </main>
    </>
  )
}