<?php

namespace App\Http\Controllers;

use App\Helpers\UploadPaths;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function  productCreateView () {
        return view('product.create');
    }
    public function productCreate(Request $request){
        $name = $request->get('name');
        $price = $request->get('price');
        $filePhotoUrl = $request->file('photo');
        $user = Auth::user()->id;
        if(isset($filePhotoUrl)){
            $productPhotoName = uniqid('product_'). '.' . $filePhotoUrl->getClientOriginalExtension();
            $filePhotoUrl->move(UploadPaths::getUploadPath('product_photos'),$productPhotoName);
        }
        Product::create([
            'name' => $name,
            'price' => $price,
            'photo' => $productPhotoName,
            'is_approve' => false,
            'created_by' => $user,
            'updated_by' => $user
        ]);
        return '/başarılı';
    }
    public function indexView()
    {
        $user = Auth::user()->id;
        $products = Product::with(['user'])->where('updated_by','=',$user)->where('created_by','=',$user)->where('deleted_at','=',null)->get();
        return view('product.index',compact('products'));
    }
}
