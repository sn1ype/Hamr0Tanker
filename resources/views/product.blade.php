@extends("master")
@section("content")

<div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
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
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      {{-- <div class="trending-wrapper">
          <h3>Available Tankers</h3>
          @foreach ($products as $item)
          <div class="trending-item">
            <a href="detail/{{$item["id"]}}">
            <img class="trending-image" src="{{asset('images/'.$item["gallery"])}}">
       <div class="trending-text">
               <h3>{{$item["name"]}}</h3>
             
       </div>
        </a>
    </div>
   @endforeach
</div> --}}
      </div>
</div>
@endsection