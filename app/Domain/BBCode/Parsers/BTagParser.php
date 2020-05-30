<?php

namespace Domain\BBCode\Parsers;

class BTagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[b(\:.*?)\](.*?)\[\/b(\:.*?)\]/m', '[b]$2[/b]', $text);

        return $next($newText);
    }
}
