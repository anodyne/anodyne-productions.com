import Link from 'next/link'
import { Container } from '@/components/marketing/Container'
import { AnodyneLogo } from '@/components/Logos'
import { NavLink } from '@/components/marketing/NavLink'

export function Footer() {
    return (
        <footer className="bg-slate-50">
            <Container>
                <div className="py-16">
                    <AnodyneLogo className="mx-auto h-6 w-auto grayscale text-slate-400" />

                    <nav className="mt-10 text-sm" aria-label="quick links">
                        <div className="-my-1 flex flex-col sm:flex-row text-center sm:text-left justify-center gap-x-6">
                            <NavLink href="#features">Features</NavLink>
                            {/* <NavLink href="#download">Download</NavLink> */}
                            <NavLink href="/docs/3.0/introduction">Docs</NavLink>
                            <NavLink href="#faq">FAQs</NavLink>
                            {/* <NavLink href="#resources">Resources</NavLink> */}
                            {/* <NavLink href="https://discord.gg/7WmKUks">Get Help</NavLink> */}
                            {/* <NavLink href="/nova-3">Nova 3</NavLink> */}
                        </div>
                    </nav>
                </div>

                <div className="flex flex-col items-center border-t border-slate-400/10 py-10 sm:flex-row-reverse sm:justify-between">
                    <div className="flex items-center gap-x-6">
                        <Link
                            href="https://twitter.com/anodyneprod"
                            className="group"
                            aria-label="Anodyne on Twitter"
                        >
                            <svg aria-hidden="true" className="h-6 w-6 fill-slate-400 group-hover:fill-slate-600">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0 0 22 5.92a8.19 8.19 0 0 1-2.357.646 4.118 4.118 0 0 0 1.804-2.27 8.224 8.224 0 0 1-2.605.996 4.107 4.107 0 0 0-6.993 3.743 11.65 11.65 0 0 1-8.457-4.287 4.106 4.106 0 0 0 1.27 5.477A4.073 4.073 0 0 1 2.8 9.713v.052a4.105 4.105 0 0 0 3.292 4.022 4.093 4.093 0 0 1-1.853.07 4.108 4.108 0 0 0 3.834 2.85A8.233 8.233 0 0 1 2 18.407a11.615 11.615 0 0 0 6.29 1.84" />
                            </svg>
                        </Link>

                        <Link
                            href="https://github.com/anodyne"
                            className="group"
                            aria-label="Anodyne on GitHub"
                        >
                            <svg aria-hidden="true" className="h-6 w-6 fill-slate-400 group-hover:fill-slate-600">
                                <path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z" />
                            </svg>
                        </Link>

                        <Link
                            href="https://patreon.com/anodyneproductions"
                            className="group"
                            aria-label="Anodyne on Patreon"
                        >
                            <svg viewBox="0 0 71 55" xmlns="http://www.w3.org/2000/svg" className="h-4 w-auto fill-slate-400 group-hover:fill-slate-600"><g clipPath="url(#clip0)"><path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z"/></g><defs><clipPath id="clip0"><rect width="71" height="55" fill="white"/></clipPath></defs></svg>
                        </Link>

                        <Link
                            href="https://patreon.com/anodyneproductions"
                            className="group"
                            aria-label="Anodyne on Patreon"
                        >
                            <svg viewBox="0 0 569 546" xmlns="http://www.w3.org/2000/svg" className="h-4 w-auto fill-slate-400 group-hover:fill-slate-600"><g><circle cx="362.589996" cy="204.589996" r="204.589996"></circle><rect height="545.799988" width="100" x="0" y="0"></rect></g></svg>
                        </Link>
                    </div>

                    <p className="mt-6 text-sm text-slate-500 sm:mt-0">
                        Copyright &copy; {new Date().getFullYear()} Anodyne. All rights reserved.
                    </p>
                </div>
            </Container>
        </footer>
    )
}