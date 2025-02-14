<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
       // 'user_id' => 'required',
        'purchase_date' => 'required',
        'ingreduent' => 'required',
        'expiration_date' => 'required',
    );
}
