<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $posts = Food::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
            $headline['body'] = nl2br($headline['body']);
            // $postsの残り全部、bodyに対してnl2br()を適用



        } else {
            $headline = null;
        }

        return view('food.index', ['headline' => $headline, 'posts' => $posts]);

    }
    public function add()
    {
        return view('food.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Food::$rules);

        $news = new Food;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $food->image_path = basename($path);
        } else {
            $food->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $food->fill($form);
        $food->save();
        // 追記ここまで
        // admin/news/createにリダイレクトする        
        return redirect('create');
    }

    }
