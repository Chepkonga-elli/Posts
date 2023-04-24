<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search()
    {
        $start = microtime();

        $q = request()->q;
        $res = [];
        $res = Post::where('id', $q)
            ->orWhere('title', 'like', '%' . $q . '%')
            ->orWhere('body', 'like', '%' . $q . '%')->get();
        $duration = microtime($start);
        return view('search.index', ['results' => $res, 'duration' => $duration]);
    }
}
