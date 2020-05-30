<?php

namespace Domain\BBCode\Parsers;

class ListTagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[list(\:.*?)\](.*?)\[\/list(\:.*?)\]/m', '[list]$2[/list]', $text);

        return $next($newText);
    }
}
