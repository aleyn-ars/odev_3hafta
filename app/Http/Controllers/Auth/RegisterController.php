<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Receivers;
use App\Sellers;
use App\User;
use http\Env\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



    protected function create(array $data)
    {
        if ($data['secim']=='tedarikci')
        {
            $user=User::create([
               'name' => $data['name'],
               'email' => $data['email'],
               'password' => Hash::make($data['password']),
               'user_type'=>'seller'
            ]);

        $to_name = 'OBLONG';
        $to_email = $data['email'];
        $username=$data['name'];
        $body = [];
        $mailData = array('body'=>$body,'username'=>$username);
        Mail::send('email.register-mail',$mailData, function ($message) use ($to_name,$to_email){
           $message->to($to_email,$to_name)->subject('Aramıza Hoşgeldiniz');
           $message->from(env('MAIL_USERNAME'), 'OBLONG');
       });
            return $user;
        }


        elseif ($data['secim']=='alici')
        {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type'=>'receiver'

        ]);
        $to_name = 'OBLONG';
        $to_email = $data['email'];
        $username=$data['name'];
        $body = [];
        $mailData = array('body'=>$body,'username'=>$username);
        Mail::send('email.register-mail',$mailData, function ($message) use ($to_name,$to_email){
            $message->to($to_email,$to_name)->subject('Aramıza Hoşgeldiniz');
            $message->from(env('MAIL_USERNAME'), 'OBLONG');
        });
            return $user;
        }

    }

    public function messagebox(Request $data)
    {
        DB::table('message')->insert([
            'name' => $data->get('name'),
            'email' => $data->get('email'),
            'subject'=>$data->get('subject'),
            'message'=>$data->get('message')
            ]);
        return back();
    }
}
