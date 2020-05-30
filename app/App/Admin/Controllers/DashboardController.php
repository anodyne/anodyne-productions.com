<?php

namespace App\Admin\Controllers;

use Inertia\Inertia;

class DashboardController
{
    public function __invoke()
    {
        return Inertia::render('Admin/Dashboard');
    }
}
