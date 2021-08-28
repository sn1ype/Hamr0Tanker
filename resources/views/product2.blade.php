
<?php

$user = auth()->user();
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>HamroTanker</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div style="max-width:100%">
  
    <section id="top" style="max-width: 100%" class=" slider_section position-relative">
      <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
        <div class="carousel-inner">
            
          <div  class="carousel-item active">
            <div style="height:270px;width:100%" class="img-box">
              <img style="width: 100%;height:100%" src="{{asset('images/carousel/banner.jpg')}}" alt="">
            </div>
          </div>
          @foreach ($carousel as $item)
          <div class="carousel-item">
            
            <div class="carousel-caption d-none d-md-block slider-text">
                <h3 class="display-4">{{$item->name}}</h3>
                <p class="lead">{{$item->desc}}</p>
              </div>
            <div style="height:270px;width:100%" class="img-box">
              <img style="max-width: 100%;height:100%" src="{{asset('images/carousel/'.$item["gallery"])}}" alt="">
            </div>
          </div>
          @endforeach
        </div>
       
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
        
      </div> 
    </section>

  </div>

  <!-- nav section -->

  <section class="nav_section">
    <div class="container">
      <div class="custom_nav2">
        <nav class="navbar navbar-expand custom_nav-container ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#aboutus">About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#tankers">Our Tankers </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/testimonial">Testimonial</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactus">Contact Us</a>
                </li>
                @if(Auth::user())
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-target="#navItemGame"  id="navbarDropdown" role="button" data-toggle="dropdown" v-pre ><?php
                    print($user->name);?> @if($user['verified']=='2')<img style='width: 25px;height:25px' title="Verified User" src='{{asset("/images/badges/admin.png")}}'/>@endif
                  </a>
                
                <div id="#navItemGame" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a id="#navItemGame" class="dropdown-item" href="/myorders">My Orders</a>
                    <a id="#navItemGame" class="dropdown-item" href="/user">Profile</a>
                    <a id="#navItemGame" class="dropdown-item" href="/logout">Logout</a>
                  </div>
                </li>
                  @else
                  <li class="nav-item">
                    <a class="nav-link" href="/login">
                      <i class="fa fa-user" style="color:green">
                       
                      </i>
                      Login
                    </a>
                  </li>
            @endif
            @if ($user==NULL)
            <span></span>
            @else
      @if($user['role']=='2')
            <li class="nav-item">
              <a class="nav-link" href="/admin">
                <i class="fa fa-lock" style="color:red">
                  
                </i>
                Admin
              </a>
            </li>
            @else
                <span></span>
            
            @endif
            @endif
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </section>

  <!-- end nav section -->

  <!-- shop s@ection -->
 
      
 
@if($count!=0)

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="box">
        <div class="detail-box">
          <h2>
           Currently Booked/Deleverying 
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available
          </p>
        </div>
        <div class="container-fluid">
            <div class="row">
        @foreach ($tanker as $item)
        <div style="margin-bottom: 30px" class="col-md-3">
        <div class="img-box">
          <img style="height:250px;width:100%;padding-bottom:20px" src="{{asset('/images/tanker/'.$item["image"])}}" alt="">
        <p>Capacity : {{$item->capacity}}L</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price &nbsp;&nbsp;&nbsp; :&nbsp; Rs.{{$item->price}}</p>
        </div>
        <div class="btn-box">
          <a onclick="alert('Sorry this tanker is being delivered')">
            ❌ Booked
          </a>
        </div>
        </div>
        @endforeach
            </div>
        </div>
      </div>
    </div>
  </section>
 @endif
 
  <!-- end shop section -->

  <!-- about section -->

  
  <section id="tankers" class="shop_section layout_padding">
    <div class="container">
  <div class="box">
  <div class="detail-box">
    <h2>
      Available Tankers
    </h2>
    <p>
      There are many variations of passages of Lorem Ipsum available
    </p>
  </div></div></div></section>
  <!-- end about section -->
  <div class="container-fluid">
    <div class="row">
    @foreach ($products as $item)
    <div style="margin-bottom: 30px" class="col-md-3"> 
        <a style="text-decoration: none;color:grey" href="/tanker/{{$item->id}}">
          <div class="fruit_container">
            <div class="box">
              <img style="height:250px;width:100%;padding-bottom:20px" src="{{asset('/images/tanker/'.$item["image"])}}" alt="">
              <div>
                <h5>
                Name   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  {{$item->name}}
                </h5>
                <h5>
                    Capacity : {{$item->capacity}}L
                   </h5>
                   <h5>
                   Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rs.{{$item->price}}
                   </h5>
              </div>
            </div>
          </div>
                </a>
            </div>
            @endforeach
           
    </div>
          </div>
          <br/>
          <br/>
          <br/>
          <section id="aboutus" class="about_section">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 px-0">
                  <div class="img-box">
                    <img src="{{asset('/images/tanker/1619871454.jpg')}}" alt="">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="detail-box">
                    <div class="heading_container">
                      <hr>
                      <h2>
                        About Our Service
                      </h2>
                    </div>
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour
                    </p>
                    <a href="/about_us">
                      Read More
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <br/>
          <br/>
          <br/>
      

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container ">
      <div class="heading_container">
        <h2>
          Cutomer Says What?
        </h2>
        <hr>
      </div>
    
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            
          <div class="carousel-item active">
            <div class="client_container layout_padding-top">
              <div class="img-box">
                <img src="{{asset("/images/testimony/default.png")}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                 Name
                </h5>
                <p>
                  <img src="images/left-quote.png" alt="">
                  <span>
                    Subject
                  </span>
                  <img src="images/right-quote.png" alt=""> <br>
                 description
                </p>
                
              </div>
            
            </div>
            
          </div>
          @foreach ($testimony as $item)
          <div class="carousel-item">
            <div class="client_container layout_padding-top">
              <div class="img-box">
                <img src="{{asset("/images/testimony/".$item["image"])}}" alt="">
              </div>
              <div class="detail-box">
                <h5>
                 {{$item->name}}
                </h5>
                <p>
                  <img src="images/left-quote.png" alt="">
                  <span>
                    {{$item->subject}}
                  </span>
                  <img src="images/right-quote.png" alt=""> <br>
                  {{$item->desc}}
                </p>
                
              </div>
            
            </div>
            
          </div>
          @endforeach
        </div> 
        <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
     
    </div>
  </section>

  <!-- end client section -->


  <!-- contact section -->
  <section id="contactus" class="contact_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="offset-lg-2 col-md-10 offset-md-1">
          <div class="heading_container">
            <hr>
            <h2>
              Request A call back
            </h2>
          </div>
        </div>
      </div>

      <div class="layout_padding2-top">
        <div class="row">
          <div class="col-lg-4 offset-lg-2 col-md-5 offset-md-1">
            <form action="">
              <div class="contact_form-container">
                <div>
                  <div>
                    <input type="text" placeholder="Full Name" />
                  </div>
                  <div>
                    <input type="email" placeholder="Email" />
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" />
                  </div>
                  <div>
                    <input type="text" class="message_input" placeholder="Message" />
                  </div>
                  <div>
                    <button type="submit">
                      Send
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 px-0">
            <div class="map_container">
              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJOfOCwd0Z6zkRgSAB3QaRAOw&key=AIzaSyC3o5eBytuPJij6ieGzZeFPaf90enpBQvk" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding">
    <div class="container">
      <div class="info_logo">
        <h2>
          HamroTanker
        </h2>
      </div>
      <div class="info_contact">
        <div class="row">
          <div class="col-md-4">
            <a href="">
              <img src="images/location.png" alt="">
              <span>
                Gwarko, Lalitpur, Nepal
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="">
              <img src="images/call.png" alt="">
              <span>
                Call : +012334567890
              </span>
            </a>
          </div>
          <div class="col-md-4">
            <a href="mailto:aashish@myktm.ml">
              <img src="images/mail.png" alt="">
              <span>
               aashish@myktm.ml
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-lg-9">
          <div class="info_form">
            <form action="">
              <input type="text" placeholder="Enter your email">
              <button>
                subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-4 col-lg-3">
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved. Design by
      <a href="https://www.snype.tk/">Aashish</a><a style="float: right" href="#top"><button style="border: 0px;background:none;">Go To Top</button></a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/uijs/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/uijs/bootstrap.js"></script>
  <script type="text/javascript" src="js/uijs/custom.js"></script>

</body>

</html>
