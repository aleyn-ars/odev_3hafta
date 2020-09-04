<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $fillable=[
        'name','username','email','password'//doldurabilir alanlar null geçme anlamında
    ];
}
