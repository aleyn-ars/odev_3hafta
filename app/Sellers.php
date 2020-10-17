<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    protected $fillable=[
        'name','email','company','phone','member_type','user_type'//doldurabilir alanlar null geçme anlamında
    ];
    protected $table="seller";
}
