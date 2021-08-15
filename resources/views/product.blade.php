@extends("master")
@section("content")


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
      @if($item['name'])
      <div class="carousel-caption d-none d-md-block slider-text">
        <h3 class="display-4">{{$item->name}}</h3>
        <p class="lead">{{$item->desc}}</p>
       
     
      </div> @endif
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