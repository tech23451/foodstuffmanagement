<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'purchase_date' => 'required|date',
        'ingredient' => 'required|string|max:30',
        'expiration_date' => 'required|date',
        'expiration_time' => 'required|integer|min:0|max:24', // 「指定なし」(24) を許可
        'image' => 'nullable|image|max:2048', // 画像は任意で、最大2MB
       
        
    );

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
