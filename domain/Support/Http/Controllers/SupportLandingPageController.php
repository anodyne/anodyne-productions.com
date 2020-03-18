<?php

namespace Domain\Support\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportLandingPageController extends Controller
{
    public function __invoke(Request $request)
    {
        return 'support home';
        // Discord
        // Forums
        // Email
    }
}
