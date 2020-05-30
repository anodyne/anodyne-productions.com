<?php

namespace Domain\BBCode\Parsers;

class ITagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[i(\:.*?)\](.*?)\[\/i(\:.*?)\]/m', '[i]$2[/i]', $text);

        return $next($newText);
    }
}
