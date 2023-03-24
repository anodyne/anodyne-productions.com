<?php

namespace App\Components;

use BladeUIKit\Components\Markdown\Markdown as BUKMarkdown;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\MarkdownConverterInterface;

class Markdown extends BUKMarkdown
{
    protected function converter(): MarkdownConverterInterface
    {
        $options = array_merge($this->options, [
            'html_input' => $this->htmlInput,
            'allow_unsafe_links' => $this->allowUnsafeLinks,
        ]);

        if ($this->flavor === 'github') {
            return new GithubFlavoredMarkdownConverter($options);
        }

        return new CommonMarkConverter();
    }
}
