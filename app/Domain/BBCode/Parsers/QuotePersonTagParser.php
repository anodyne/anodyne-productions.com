<?php

namespace Domain\BBCode\Parsers;

class QuotePersonTagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[quote(\=.*?)\](.*?)\[\/quote(\:.*?)\]/m', '[quote]$2[/quote]', $text);

        return $next($newText);
    }
}