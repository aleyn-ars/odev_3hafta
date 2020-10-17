<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivers extends Model
{
    protected $fillable=[
        'name','email','company','phone','member_type','user_type'//doldurabilir alanlar null geçme anlamında
    ];
}
