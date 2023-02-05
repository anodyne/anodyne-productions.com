import Image from "next/image";
import Link from "next/link";
import { Tag } from "./Tag";

export default function Card({ addon }) {
    return (
        <div className="group relative flex flex-col overflow-hidden rounded-xl ring-1 ring-gray-900/5 bg-white shadow-lg">
            <div className="aspect-w-3 aspect-h-3 bg-gray-200 group-hover:opacity-75 transition">
                {/* <Image width={500} height={500} src={addon.previewImage} className="object-contain object-center" alt="" /> */}
                <Image width={500} height={300} src="https://via.placeholder.com/300" className="object-contain object-center" alt="" />
            </div>
            <div className="flex flex-1 flex-col p-4">
                <div className="flex items-center gap-x-3">
                    <Tag>{addon.type}</Tag>

                    {addon.products.map(product => (
                        <Tag key={product.name}>{product.name}</Tag>
                    ))}
                </div>

                <h3 className="text-base font-semibold text-gray-900 mt-3">
                    <Link href={`/addons/` + addon.slug}>
                        <span aria-hidden="true" className="absolute inset-0"></span>
                        {addon.name}
                    </Link>
                </h3>

                <div className="flex items-center space-x-3">
                    <div className="flex items-center space-x-0.5">
                        {[...Array(addon.ratings.floor)].map((a, b) =>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="h-4 w-4 text-amber-400" key={b}><path fillRule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clipRule="evenodd" /></svg>
                        )}
                        {[...Array(addon.ratings.remaining)].map((c, d) =>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" className="h-4 w-4 text-slate-300" key={d}><path fillRule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clipRule="evenodd" /></svg>
                        )}
                    </div>
                    <span className="text-xs font-semibold text-slate-500">{addon.ratings.value}</span>
                    {/* <span className="text-xs text-slate-500">(12 reviews)</span> */}
                </div>

                {/* {addon.description && (
                    <p className="mt-3 text-sm text-gray-600">{addon.description}</p>
                )} */}

                <div className="mt-6 flex items-center gap-x-4">
                    <div className="flex items-center space-x-3">
                        <Image src={addon.user.avatar} height={32} width={32} className="h-9 w-9 rounded-full" alt={addon.user.name} />
                        <span className="text-sm font-medium text-gray-600">{addon.user.name}</span>
                    </div>
                </div>
            </div>
        </div>
    )
}