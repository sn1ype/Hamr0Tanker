
@extends('product')
@section('tanker')
    
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <style>
        body{
            background-color: rgb(27, 65, 65);
        }
    </style>
</head>

<div style="margin-top: 20px;text-align:center;color:rgb(72, 182, 182);">
   <br> <h3 style="font-size:30px;margin-top:10px">Available Tankers</h3>
</div>

<div class="container-fluid ">
  
	<div class="row" id="ads">
    <!-- Category Card -->
    @foreach ($products as $item)
    <div style="margin-bottom: 30px" class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">{{$item->name}}</span>
                {{-- <span class="card-notify-year">2018</span> --}}
                <img style="height:250px;width:100%;padding-bottom:20px" class="img-fluid" src="{{asset('/images/tanker/'.$item["image"])}}" alt="Tanker Image" />
            </div>
            <div class="card-image-overlay m-auto">
                {{-- <span class="card-detail-badge">Add isbooked status here</span> --}}
                <span class="card-detail-badge">Rs.{{$item->price}}</span>
                <span class="card-detail-badge">Capacity: {{$item->capacity}}L</span>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5>Tanker</h5>
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>
    </div>
    @endforeach
 
   

    </div>
</div>

@endsection