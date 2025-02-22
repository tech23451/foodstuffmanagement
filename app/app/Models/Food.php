<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public static $rules = array(
        'purchase_date' => 'required',
        'ingreduent' => 'required',
        'expiration_date' => 'required',
        'registration_date' => 'required',
        
    );

    public function histories()
    {
        return $this->hasMany('App\Models\History');
    }
}
