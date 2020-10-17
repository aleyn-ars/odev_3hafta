<?php

namespace App\Http\Controllers;

use App\Helpers\UploadPaths;
use App\User;
use App\customers;
use Illuminate\Http\Request;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function adminindex()
    {
        return view('layouts.admin-master');
    }
    public function indexView()
    { $users=users::where('deleted_at','=',null)->get();//tabloda deleted_at boş olanları çeker
        return view('users',compact('users'));
    }

        public function delete($id)
        {
            // DB::table('users')->where('id','=',$id)->delete(); // Hard delete ile veriyi kalıcı siler. TAVSİYE EDİLMEZ!
            DB::table('users')->where('id','=',$id)->update([
                'deleted_at' => Carbon::now()
            ]);
            return 'Başarıyla Silindi';
        }

    public function register(){
        return view('register');
    }

      public function rememberpassword(){
        return view('layouts.remember-password');
    }

    public function create(Request $request ){
        $password=$request->get('password');
        DB::table('users')->insert([
            'name'=>$request->get('name'),
            'username'=>$request->get('username'),
            'email'=>$request->get('email'),
            'password'=>$password->get(),
            'created_at'=>Carbon::now(),
        ]);
        return"<script>('kayıt başarıyla tamamlandı')</script>";
    }

    public function updateView($id)
    {
        $user=Db::table('users')->where('id',$id)->get();
        $user=$user->first();
        return view('update' , compact('user'));
    }

    public function update(Request $Request,$id)
    {
        DB::table('users')->where('id' , $id)->update([
            'name' => $Request->get('name'),
            'email' => $Request->get('email'),
            'updated_at' => Carbon::now()
        ]);
        return "<script>alert('KAYIT GÜNCELLENDİ')</script>";
    }

    public function qweView()
    {
        return view('Layouts.user-master');
    }
    public function userAll()
    {
        return User::all();
    }

    public function aboutView()
    {
        return view('layouts.about-master');
    }
    public function servicesView()
    {
        return view('layouts.services-master');
    }
    public function blogView()
    {
        return view('layouts.blog-master');
    }
    public function contactView()
    {
        return view('layouts.contact-master');
    }
    public function referenceView()
    {
        return view('layouts.reference-master');
    }
    public function update_avatar(Request $request)
    {
        $filePhotoUrl = $request->file('avatar');
        $profilePhotoName = uniqid('profile') . '.' . $filePhotoUrl->getClientOriginalExtension();
        $filePhotoUrl->move(UploadPaths::getUploadPath('users_avatar'), $profilePhotoName);
        User::where('id', Auth::user()->id)->update([
            'avatar' => $profilePhotoName,
        ]);
        return back();
    }
     public function profile()
     {
      return view('users.form');
     }


}
