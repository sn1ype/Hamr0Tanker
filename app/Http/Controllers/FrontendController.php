<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class FrontendController extends Controller
{
    public function index()
    {
        //Read
        $carousel=Carousel::all();
       
        return view('product',compact('carousel'));
    }
}
