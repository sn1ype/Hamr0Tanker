
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
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
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
  <section class="shop_section layout_padding">

  <div class="container-fluid col-md-6">
    <!-- resources/views/tankers/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Similar Tankers</title>
</head>
<body>
    <h1>Similar Tankers for '{{ $queryTankerName }}'</h1>
    <div class="container-fluid col-md-6">
        <div class="row ">
    @if(count($similarities) > 0)
        <ul>
            @foreach($similarities as $similarity)
                <li>
                    {{ $similarity['tanker']->name }},  {{ $similarity['tanker']->price }}   (Similarity: {{ $similarity['similarity'] }}, Match %: {{ $similarity['matchPercentage'] }}%)
                    <!-- You can access other attributes of the Tanker model as well -->
                    <!-- For example: $similarity['tanker']->attribute_name -->
                </li>

                    <div style="margin-bottom: 30px" class="col-md-10">
                        <a style="text-decoration: none;color:grey" href="/tanker/{{ $similarity['tanker']->id}}">
                          <div class="fruit_container">
                            <div class="box">
                              <img style="height:250px;width:100%;padding-bottom:20px" src="{{asset('/images/tanker/'. $similarity['tanker']->image)}}" alt="">
                              <div>
                                <h5>
                                Name   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  {{ $similarity['tanker']->name}}
                                </h5>
                                <h5>
                                    Capacity : {{ $similarity['tanker']->capacity}}L
                                   </h5>
                                   <h5>
                                   Price &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Rs.{{ $similarity['tanker']->price}}
                                   </h5>
                              </div>
                            </div>
                          </div>
                                </a>
                            </div>
            @endforeach
                        </div>
                        </div>

        </ul>
    @else
        <p>No similar tankers found.</p>
    @endif
</body>
</html>

          </div>
  </section>


  <!-- end shop section -->

  <!-- about section -->






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
