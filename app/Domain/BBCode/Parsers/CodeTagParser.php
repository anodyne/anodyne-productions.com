<?php

namespace Domain\BBCode\Parsers;

class CodeTagParser
{
    public function handle($text, $next)
    {
        $newText = preg_replace('/\[code(\:.*?)\](.*?)\[\/code(\:.*?)\]/m', '[code]$2[/code]', $text);

        return $next($newText);
    }
}
