<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
            $headline['body'] = nl2br($headline['body']);
            // $postsの残り全部、bodyに対してnl2br()を適用



        } else {
            $headline = null;
        }

        return view('news.index', ['headline' => $headline, 'posts' => $posts]);

    }
}
