<?php

namespace App\Support\Controllers;

use Illuminate\Http\Request;
use Domain\Support\Models\Post;
use Support\Controllers\Controller;

class SearchForumController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('support.search-forums', [
            'query' => $request->get('query'),
            'results' => Post::search($request->get('query'))->paginate(10),
        ]);
    }
}
