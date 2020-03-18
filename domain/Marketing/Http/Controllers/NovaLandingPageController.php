<?php

namespace Domain\Marketing\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NovaLandingPageController extends Controller
{
    public function __invoke(Request $request)
    {
        return view()->component('MarketingNova');
    }
}
