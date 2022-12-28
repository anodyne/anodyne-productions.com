import Image from "next/image";
import { Tag } from "./Tag";

export default function Card({ addon }) {
    return (
        <div className="group relative flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white">
            <div className="aspect-w-3 aspect-h-4 bg-gray-200 group-hover:opacity-75 sm:aspect-none sm:h-96 transition">
                <Image width={1280} height={1648} src="https://tailwindui.com/img/ecommerce-images/category-page-02-image-card-01.jpg" className="h-full w-full object-cover object-center sm:h-full sm:w-full" alt="Eight shirts arranged on table in black, olive, grey, blue, white, red, mustard, and green." />
            </div>
            <div className="flex flex-1 flex-col space-y-2 p-4">
                <h3 className="text-sm font-medium text-gray-900">
                    <a href="#">
                        <span aria-hidden="true" className="absolute inset-0"></span>
                        {addon.name}
                    </a>
                </h3>

                {addon.description && (
                    <p className="text-sm text-gray-500">{addon.description}</p>
                )}

                <div className="flex items-center gap-x-4">
                    <Tag>{addon.type}</Tag>
                    <p className="text-sm italic text-gray-500">{addon.downloads} downloads</p>
                    {/* <p className="text-base font-medium text-gray-900">$256</p> */}
                </div>
            </div>
        </div>
    )
}