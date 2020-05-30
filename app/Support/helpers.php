<?php

use Inertia\Inertia;
use Illuminate\Pipeline\Pipeline;

if (! function_exists('inertia')) {
    function inertia($component, array $data = [])
    {
        Inertia::setRootView('layouts.app');

        return Inertia::render($component, $data);
    }
}

if (! function_exists('pipe')) {
    function pipe($passable)
    {
        return app(Pipeline::class)->send($passable);
    }
}
