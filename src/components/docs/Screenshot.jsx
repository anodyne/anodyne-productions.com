import Image from "next/future/image";

export function Screenshot({ src, alt }) {
   return (
      <div className="px-8 overflow-hidden rounded-xl w-full bg-gradient-to-tr from-purple-500 dark:from-purple-600 to-cyan-400 dark:to-cyan-500 via-sky-500 dark:via-sky-600">
         <Image src={src} alt={alt} width={2700} height={1700} className="overflow-hidden rounded-lg shadow-xl ring-1 ring-black/5" />
      </div>
   )
}