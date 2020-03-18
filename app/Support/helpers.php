<?php

use Inertia\Inertia;

if (! function_exists('inertia')) {
    function inertia($component, array $data = [])
    {
        Inertia::setRootView('layouts.app');

        return Inertia::render($component, $data);
    }
}