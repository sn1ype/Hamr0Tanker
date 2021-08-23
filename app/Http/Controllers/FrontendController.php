<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Tanker;
use App\Models\User;
use App\Models\Orders;
use App\Models\Testimony;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        //Read
        $carousel=Carousel::all();
        $products= Tanker::where('status','=','available')->get();
        $tanker= Tanker::where('status','=','Booked')->get();
        $count=Tanker::where('status','booked')->count();
        $testimony=Testimony::where('status','=','confirmed')->get();
       
               
        return view('product2',compact('carousel','products','tanker','testimony','count'));
    }
    
    public function dashboard()
    {
        //Read
    
        
        return view('admin.dashboard');
       
    }
    public function profile()
    {
        //Read
       
       
        return view('admin.profile');
    }

    public function usersTable()
    {
        //Read
       $users=User::all();
       
        return view('admin.userstable',compact('users'));
    }

    public function carousel()
    {
        //Read
       $carousel=Carousel::all();
       
        return view('admin.carousel',compact('carousel'));
    }

    public function Tanker()
    {
        //Read
       $tankers=Tanker::all();
       
        return view('admin.tanker',compact('tankers'));
    }

    public function User()
    {
        
       
        return view('user');
    }
    public function Error()
    {
        //Read
       
       
        return view('errors.error');
    }
    public function MyOrder()
    {
        $user = Auth::id();
        $orders = Orders::where('user_id', $user)->get();
       
       
        return view('myorders',compact('orders'));
    }
}
