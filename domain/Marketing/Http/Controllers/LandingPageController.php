<?php

namespace Domain\Marketing\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function __invoke(Request $request)
    {
        return view()->component('MarketingHome');
    }
}