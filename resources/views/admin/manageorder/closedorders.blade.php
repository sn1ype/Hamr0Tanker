

@extends('admin.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="container">


    <div class="custom-product">
        <div class="col-sm-12">
         <div class="trending-wrapper">
             <h4>Closed Orders</h4><br>
             @foreach ($orders as $item)
             <div class="row searched-item cart-list-divider">
             <div class="col-sm-3">
                
                     <img style="width: 200px; height: 100px" class="trending-image" src="{{asset('/images/orders/order.jpg')}}">
     
              
             </div>
             <div class="col-sm-3">
                 
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
                <div>
                    @if (session('status'))
                    <div class="alert alert-success" id="clickme" >
                        {{ session('status') }}
                    </div>
                @endif
                <button class="btn btn-danger"><a href="/admin/orders/closeorder/{{$item->tanker_id}}">Close Order</button></a>
            </div>
                
            </div>
                     
             </div>
            
       </div>
      @endforeach
     </div>
       
     </div><br><br>


</div>
            </div>
        </div>
    </div>
</div>


@endsection