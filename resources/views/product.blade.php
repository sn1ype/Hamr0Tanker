@extends("master")
@section("content")

{{-- <div style="height: 350px" class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel"> --}}
        {{-- <!-- Indicators -->
        {{-- <ol class="carousel-indicators">
          @foreach ($carousel as $item)
          <li data-target="#myCarousel" data-slide-to="{{$item["id"]}}" class="active"></li>
         @endforeach
        </ol> --}}
      
        <!-- Wrapper for slides -->
        {{-- <div class="carousel-inner">
            @foreach ($carousel as $item)
             <div class="item {{$item["id"]==1?'active':''}}">
                     <a href="#">
                        <img style="margin-left: auto; margin-right:auto; " class="slider-img" src="{{asset('images/carousel/'.$item["gallery"])}}">
                        <div class="carousel-caption slider-text">
                                <h3>{{$item["name"]}}</h3>
                                <p>{{$item["desc"]}}!</p>
                        </div>
                     </a>
             </div>
            @endforeach
        </div> --}}
      
        <!-- Left and right controls -->
        {{-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div> --}}
{{-- <div class="container-fluid border">
      <div class="trending-wrapper">
          <h3>Available Tankers</h3>
          @foreach ($products as $item)
          <div class="trending-item">
            <a style="text-decoration: none;color:black;" href="detail/{{$item["id"]}}">
            <img class="trending-image" src="{{asset('/images/tanker/'.$item["image"])}}">
       <div class="trending-text">
               <h3>{{$item["name"]}}</h3>
             
       </div>
        </a>
    </div>
   @endforeach
</div>
</div> --}}
<div style="margin-top:-20px">
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  {{-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol> --}}
  <div class="carousel-inner" role="listbox">
    <!-- Slide One - Set the background image for this slide in the line below -->
    <div class="carousel-item active" style="height:250px;width:100%">
      <img style="width: 100%;height:100%" src="{{asset('images/carousel/banner.jpg')}}">
      <div class="carousel-caption d-none d-md-block ">
        {{-- <h3 class="display-4">HamroTanker</h3>
        <p class="lead">Play your part. We did ours</p> --}}
      </div>
    </div>
    <!-- Slide Two - Set the background image for this slide in the line below -->
    @foreach ($carousel as $item)
        
    
    <div class="carousel-item" style="height:250px">
      <img style="width: 100%;height:100%" src="{{asset('images/carousel/'.$item["gallery"])}}">
      <div class="carousel-caption d-none d-md-block slider-text">
        <h3 class="display-4">{{$item->name}}</h3>
        <p class="lead">{{$item->desc}}</p>
      </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
</div>


      @yield('tanker')

@endsection