<?php
use App\Models\Orders;
$orders=Orders::all();

?>

@extends('admin.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="container">


    <div class="custom-product">
        <div class="col-sm-10">
         <div class="trending-wrapper">
             <h4>Active Orders</h4><br>
             @foreach ($orders as $item)
             <div class="row searched-item cart-list-divider">
             <div class="col-sm-3">
                
                     <img class="trending-image" src="{{asset('/images/tanker/'.$item["image"])}}">
     
              
             </div>
             <div class="col-sm-4">
                 
                <div class="item-desc">
                        <h2>{{$item->tanker_name}}</h2>
                        <h5>User : {{$item->user_name}}</h5>
                        <h5>Payment Status : {{$item->payment}} on delivery</h5>
                        <h5>Deleviry Status : {{$item->status}}</h5>
                        <h5>Number : {{$item->number}}</h5>
                        <h5>Address : {{$item->address}}</h5>
                        <h5>Street : {{$item->street}}</h5>
                      
                </div>
             
             </div>
             </div>
             <div class="col-sm-3">
                 
                <div class="item-desc">
                    @if($item["status"]=="pending")
                        <form action="/ordercanceled/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                        <button class="btn btn-danger">Cancel Order</button>
                </form>@endif<br>
                <button class="btn btn-danger"><a href="/orderleft/{{$item->id}}"> Order Left</button></a><br><br>
                <button class="btn btn-danger"><a href="/orderdelivered/{{$item->id}}">Order delivered</button></a>
                </div>
                     
             </div>
       </div>
      @endforeach
     </div>
       
     </div>


</div>
            </div>
        </div>
    </div>
</div>


@endsection