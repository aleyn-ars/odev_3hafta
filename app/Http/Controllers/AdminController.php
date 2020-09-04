<?php

namespace App\Http\Controllers;

use App\customers;
use Illuminate\Http\Request;
use Illuminate\Curl\User;
Use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.admin-master');
    }
    public function indexView()
    { $users=customers::where('deleted_at','=',null)->get();//tabloda deleted_at boş olanları çeker
        return view('customers',compact('users'));
    }
    public function delete($id)
    {
        DB::table('customers')->where('id', '=', $id)->update(['deleted_at' => Carbon::now()]);//id'ye ait kullanıcının deleted_at sütununa silme tarihi ekler ama tabloda durur soft delete
        return "<script>alert('Başarıyla Silindi')</script>";
    }
    public function register(){
        return view('register');
    }

    public function create(Request $request ){
        $password=$request->get('password');
        DB::table('customers')->insert([
            'name'=>$request->get('name'),
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'created_at'=>Carbon::now(),
        ]);
        return"<script>('kayıt başarıyla tamamlandı')</script>";
    }

    public function updateView($id)
    {
        $user =customers::where('id',$id)->get();
        $user = $user->first();

        return view('update',compact('user'));
    }

    public function update(Request $request,$id)
    {
        customers::where('id',$id)->update([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'updated_at' => Carbon::now()
        ]);
        return 'Başarıyla Güncellendi';
    }
}
