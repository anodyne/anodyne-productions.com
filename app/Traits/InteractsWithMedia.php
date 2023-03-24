<?php

namespace App\Traits;

use Spatie\MediaLibrary\InteractsWithMedia as BaseInteractsWithMedia;

trait InteractsWithMedia
{
    use BaseInteractsWithMedia;

    abstract public static function getMediaPath(): string;
}
