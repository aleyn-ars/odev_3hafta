<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable=[
        'message','name','email','subject'//doldurabilir alanlar null geçme anlamında
    ];
}
