<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Tanker;
use App\Models\User;

class FrontendController extends Controller
{
    public function index()
    {
        //Read
        $carousel=Carousel::all();
        $products= Tanker::all();
       
        return view('product',compact('carousel','products'));
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
}
