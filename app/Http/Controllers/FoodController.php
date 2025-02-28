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
        $food_form = $request->all();

        // 画像の保存
        if (isset($food_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $food->image_path = basename($path);
        } else {
            $food->image_path = null;
        }

        // 必要なフィールドの設定
        unset($food_form['_token']);
        unset($food_form['image']);
        $food->user_id = 0;
        $food->expiration_time = 0; // 追加
        $food->registration_date = date('Y-m-d');
        $food->condition = 0;
        $food->update_at = date('Y-m-d H:i:s');
        $food->delete = 0;

        // データベースに保存
        $food->fill($food_form);
        $food->save();

        return redirect('create');
    }

    public function edit($id)
    {
        $food = Food::find($id);
        if (empty($food)) {
            abort(404); // レコードが見つからなかった場合
        }

        return view('food.edit', ['food_form' => $food]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Food::$rules);

        $food = Food::find($request->id);
        if (empty($food)) {
            abort(404);
        }

        $food_form = $request->all();
 // 画像の保存
 if (isset($food_form['image'])) {
    $path = $request->file('image')->store('public/image');
    $food->image_path = basename($path);
} else {
    $food->image_path = null;
}
// expiration_date と expiration_time の処理
$food->expiration_date = $request->input('expiration_date');
$food->expiration_time = $request->input('expiration_time'); // 24がそのまま保存されます

// 必要なフィールドの設定
unset($food_form['_token']);
unset($food_form['image']);
//$food->user_id = 0;
//$food->expiration_time = 0; // 追加
//$food->registration_date = date('Y-m-d');
//$food->condition = 0;
$food->update_at = date('Y-m-d H:i:s');
//$food->delete = 0;
        
        // フォームデータを保存
        $food->fill($food_form);
        $food->save();

        return redirect('home');
    }

    public function index(Request $request)
    {
        $cond_ingreduent = $request->cond_ingreduent;
        if ($cond_ingreduent != null) {
            $posts = Food::where('ingreduent', $cond_ingreduent)->get();
        } else {
            $posts = Food::all();
        }

        return view('food.index', ['posts' => $posts, 'cond_ingreduent' => $cond_ingreduent]);
    }
}
