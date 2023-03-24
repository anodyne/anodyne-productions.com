<?php

namespace App\CommonMark\Extensions\Tag\Renderers;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class QuickLinkRenderer implements NodeRendererInterface
{
    //   <QuickLinkPattern {...pattern} mouseX={mouseX} mouseY={mouseY} />
    //   <div className="relative rounded-2xl px-4 pt-16 pb-4">
    //     <QuickLinkIcon icon={icon} />
    //     <h3 className="mt-4 text-sm font-semibold leading-7 text-slate-900 dark:text-white">
    //       <Link href={href}>
    //         <span className="absolute inset-0 rounded-2xl" />
    //         {title}
    //       </Link>
    //     </h3>
    //     <p className="mt-1 text-sm text-slate-600 dark:text-slate-400">
    //       {description}
    //     </p>
    //   </div>

    //   <div className="">
    //   <Icon icon={icon} className="" />
    // </div>

    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        return new HtmlElement(
            'div',
            [
                'class' => 'group relative flex rounded-2xl bg-slate-50 transition-shadow hover:shadow-md hover:shadow-slate-900/5 dark:bg-white/2.5 dark:hover:shadow-black/5',
                // 'onmousemove' => '',
            ],
            [
                new HtmlElement(
                    'div',
                    ['class' => 'pointer-events-none'],
                    [
                        new HtmlElement(
                            'div',
                            ['class' => 'absolute inset-0 rounded-2xl transition duration-300 [mask-image:linear-gradient(white,transparent)] group-hover:opacity-50'],
                            [
                                new HtmlElement(
                                    'svg',
                                    [
                                        'aria-hidden' => 'true',
                                        'width' => '72',
                                        'height' => '56',
                                        'x' => '50%',
                                        'class' => 'absolute inset-x-0 inset-y-[-30%] h-[160%] w-full skew-y-[-18deg] fill-black/[0.02] stroke-black/5 dark:fill-white/1 dark:stroke-white/2.5',
                                    ]
                                ),
                            ]
                        ),
                    ]
                ),
                new HtmlElement(
                    'div',
                    ['class' => 'absolute inset-0 rounded-2xl ring-1 ring-inset ring-slate-900/7.5 group-hover:ring-slate-900/10 dark:ring-white/10 dark:group-hover:ring-white/20']
                ),
                new HtmlElement(
                    'div',
                    ['class' => 'relative rounded-2xl px-4 pt-16 pb-4'],
                    [
                        new HtmlElement(
                            'div',
                            ['class' => 'flex h-10 w-10 items-center justify-center rounded-full bg-slate-900/5 ring-1 ring-slate-900/25 backdrop-blur-[2px] transition duration-300 group-hover:bg-white/50 group-hover:ring-slate-900/25 dark:bg-white/7.5 dark:ring-white/15 dark:group-hover:bg-sky-300/10 dark:group-hover:ring-sky-400'],
                            svg($node->getAttribute('icon'))->class('h-6 w-6 fill-slate-700/10 stroke-slate-700 transition-colors duration-300 group-hover:stroke-slate-900 dark:fill-white/10 dark:stroke-slate-400 dark:group-hover:fill-sky-300/10 dark:group-hover:stroke-sky-400')->toHtml(),
                        ),
                        new HtmlElement(
                            'h3',
                            ['class' => 'mt-4 text-sm font-semibold leading-7 text-slate-900 dark:text-white'],
                            [
                                new HtmlElement(
                                    'a',
                                    ['href' => $node->getAttribute('href') ?? '#'],
                                    [
                                        new HtmlElement('span', ['class' => 'absolute inset-0 rounded-2xl']),
                                        $node->getAttribute('title') ?? '',
                                    ]
                                ),
                            ]
                        ),
                        new HtmlElement(
                            'p',
                            ['class' => 'mt-1 text-sm text-slate-600 dark:text-slate-400'],
                            $node->getAttribute('description') ?? ''
                        ),
                    ]
                ),
            ]
        );
    }
}
