

@extends('master')
@section('content')

<div style="height: 900px" class="containeer">

    <div class="custom-product">
        <div class="col-sm-10">
         <div class="trending-wrapper">
             <h4>My Orders</h4><br>
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
                        <h5>Status : {{$item->status}}</h5>
                      
                </div>
             
             </div>
             <div class="col-sm-3">
                 
                <div class="item-desc">
                        <form action="/cancelorder/{{$item->id}}" method="POST">
                                @csrf
                                @method('delete')
                        <button class="btn btn-danger">Cancel Order</button>
                </form>
                </div>
                
             </div>
       </div>
      @endforeach
     </div>
        </div>
     </div>


</div>


@endsection