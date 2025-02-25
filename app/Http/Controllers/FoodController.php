<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Food;

class FoodController extends Controller
{
    
    public function add()
    {
        return view('food.create');
    }
    public function create(Request $request)
    {
        $this->validate($request, Food::$rules);

        $food = new Food;
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
        $food->user_id = 0;
        $food->expiration_time = 0;
        $food->registration_date = date('Y-m-d');
        $food->condition = 0;
        $food->update_at = date('Y-m-d H:i:s');
        $food->delete = 0;

        // データベースに保存する
        $food->fill($form);
        $food->save();

    //    $history->edited_at = Carbon::now();
        // 追記ここまで
        // admin/news/createにリダイレクトする        
        return redirect('create');
    }

    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $food = Food::find($request->id);
        if (empty($food)) {
            abort(404);
        }
        

// $value = $item->start_time ? Carbon::parse($item->start_time)->format('Y-m-d\TH:i') : '';
        return view('food.edit', ['food_form' => $food]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Food::$rules);
        // News Modelからデータを取得する
        $food = Food::find($request->id);
        // 送信されてきたフォームデータを格納する
        $food_form = $request->all();
        unset($food_form['_token']);

        // 該当するデータを上書きして保存する
        $food->fill($food_form)->save();

        return redirect('home');
    }
    public function index(Request $request)
    {
        $cond_ingreduent = $request->cond_ingreduent;
        if ($cond_ingreduent != null) {
            // 検索されたら検索結果を取得する
            $posts = Food::where('ingreduent', $cond_ingreduent)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Food::all();
        }
        return view('food.index', ['posts' => $posts, 'cond_ingreduent' => $cond_ingreduent]);
    }

    }
