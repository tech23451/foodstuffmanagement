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
            //$postsの残り全部bodyに対してnl2br()を適用
        } else {
            $headline = null;
        }


        //$posts->each(function($post) {
           // $post['body'] = nl2br($post['body']);
       // });

       foreach ($posts as $postkey => $post) {
        $posts[$postkey]['body'] = nl2br($post['body']);
    }

        return view('news.index', ['headline' => $headline, 'posts' => $posts]);

    }
}
