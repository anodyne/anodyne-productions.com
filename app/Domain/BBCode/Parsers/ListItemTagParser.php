<?php

namespace Domain\BBCode\Parsers;

class ListItemTagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[\*(\:.*?)\](.*?)\[\/\*:m(\:.*?)\]/m', '[*]$2[/*]', $text);

        return $next($newText);
    }
}
