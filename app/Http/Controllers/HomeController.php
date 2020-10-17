<?php

namespace App\Http\Controllers;
use Image;
use App\Orders;
use App\Receivers;
use App\Sellers;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userindex()
    {
        return view('home');
    }
    public function index()
    {
        return view('layouts.admin-master');
    }

    public function kisilerView()
    {
        $users = User::where('deleted_at','=',null)->get();
        return view('customers',compact('users'));

    }
    public function sellerView()
    {
        $users = User::where('user_type','=','receiver')->get();
        return view('users.seller',compact('users'));
    }
    public function receiverView()
    {
        $users = User::where('user_type','=','seller')->get();
        return view('users.seller',compact('users'));
    }
    public function adssellerView(){

        return view('ads.ads-seller');
    }
    public function formView()
    {
        return view('users.form');
    }

    public function orderform()
    {
        return view('users.orderform');
    }
   public function myorders()
   {
       $orders=DB::table('orders')
           ->where('name','=',Auth::user()->name)
           ->get();
    return view('users.my-orders', compact('orders'));
   }

    public function selleradd(Request $data)
    {

        if ($data->get('secim') == 'tedarikci') {
             DB::table('seller')->insert([
                'name' => $data->get('name'),
                'email' => $data->get('email'),
                'company' => $data->get('company'),
                'phone' => $data->get('phone'),
                'member_type' => $data->get('member_type'),
                'user_type' => 'seller',
            ]);
            return back();
        }
        elseif($data->get('secim') == 'alici'){
            DB::table('receiver')->insert([
                'name' => $data->get('name'),
                'email' => $data->get('email'),
                'company' => $data->get('company'),
                'phone' => $data->get('phone'),
                'member_type' => $data->get('member_type'),
                'user_type' => 'receiver',

            ]);
            return back();
        }
    }
    public function formaddView()
    {
        return "<script>alert('Profil güncellendi')</script>";
    }

    public function orderformget(Request $data)
    {

            DB::table('orders')->insert([

                'name' => $data->get('name'),
                'company' => $data->get('company'),
                'email' => $data->get('email'),
                'phone' => $data->get('phone'),
                'address' => $data->get('address'),
                'city' => $data->get('city'),
                'town' => $data->get('town'),
                'country' => $data->get('country'),
                'order_date' => Carbon::now(),
                'product_name' => $data->get('product_name'),
                'order_quantity' => $data->get('order_quantity'),
                'seller_no' => $data->get('seller_no'),
                'seller_mail' => $data->get('seller_mail'),
                'is_approve' => false

            ]);
        $to_name = 'OBLONG';
        $to_email=$data['seller_mail'];
        $username=$data['name'];
        $company=$data['company'];
        $body = [];
        $mailData = array('body'=>$body,'username'=>$username,'company'=>$company);
        Mail::send('email.order-mail',$mailData, function ($message) use ($to_name,$to_email) {
            $message->to($to_email, $to_name)->subject('Sipariş verdi');
            $message->from(env('MAIL_USERNAME'), 'OBLONG');

        });
        return back();
    }
    public function orderformView()
    {
        return "<script>alert('Sipariş Tamamlandı')</script>";
    }


        public function siparisView()
        {
            $orders=DB::table('orders')
                ->where('seller_no','=',Auth::user()->id)
                ->get();
            return view('users.seller-orders',compact('orders'));

        }
        public function orderapprove($id)
        {
            DB::table('orders')->where('id', '=', $id)->update(['is_approve' => '1','deleted_at' => null]);
            session()->flash('message', 'Sipariş onaylandı');
            return back();
        }

}
