<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'name' , 'company' , 'email' ,'order_date','product_name' ,'order_quantity' ,'seller_no',
        'seller_mail','created_by', 'updated_by', 'deleted_by','address'
    ];

    public function user()
    {
        return $this->hasMany('App\User','id','created_by');
    }
}
