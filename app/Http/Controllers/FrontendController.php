<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\Tanker;

class FrontendController extends Controller
{
    public function index()
    {
        //Read
        $carousel=Carousel::all();
        $products= Tanker::all();
       
        return view('product',compact('carousel','products'));
    }
}
