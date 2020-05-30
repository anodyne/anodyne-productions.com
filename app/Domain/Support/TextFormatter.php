<?php

namespace Domain\Support;

use s9e\TextFormatter\Bundles\Forum;

class TextFormatter
{
    public static function parse($text)
    {
        return Forum::render(Forum::parse($text));
    }
}
