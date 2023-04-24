<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <style>        </style>
    <title>School Library System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('css/main.css')}}"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
    crossorigin=""></script>
    <style>
      .all{
        margin:0;
        padding: 0;
        box-sizing: 0;
      }
      .slides{
        position: relative;
        background:#00000;
        height: 100vh;
        overflow: hidden;
      }
      .slide{
        position: absolute;
        inset: 0;
        opacity: 0;
        animation: sliding 12s infinite;
      }
      .slide_two{
        animation-delay: 4s;
      }
      .slide_three{
        animation-delay: 8s;
      }
      .slide_img{
        object-fit: cover
      }
      @keyframes sliding{
        0%{ opacity: 0 ;}
        10%{ opacity: 1 ;}
        20%{ opacity: 1 ; transform: scale(1.0);}
        30%{ opacity: 0 ; transform: scale(1.0);}
        100%{ opacity: 0 ;}
      }
      #map{
        height: 180px;
      }
    </style>
</head>
<body>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-3">
					<div class="logo">
            <a href="/">
              <img height="auto" src="{{asset('Image/logo.png')}}" alt="logo">
            </a>
					</div>
				</div>
				<div class="col-9 ">
          <nav class="navbar navbar-expand-lg header-right">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item mx-3">
                    <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item mx-3">
                    <a class="nav-link" href="/contact">Contact Us</a>
                  </li>
                  <li class="nav-item mx-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Login
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{route('student_login_form')}}">Student Login</a>
                      <a class="dropdown-item" href="{{route('teacher_login_form')}}">Teacher Login</a>
                      <a class="dropdown-item" href="{{route('login_form')}}">Admin Login</a>
                    </div>
                    </li>
                {{-- <li><a href="https://www.facebook.com/sekolahkebangsaantanjungminyak2/?locale=ms_MY"><i class="fab fa-facebook-f icon-position"></i></a></li> --}}

              </ul>
            </div>
          </nav>
				</div>
			</div>
		</div>
	</div>

    {{-- Image background with text --}}
    <div >

        <div class="m-5 pb-5 card showdow">
          <div class="card-body">
            <h1 class="text-primary text-center">
              <b>Contact Us</b>
            </h1>
            <div class="row m-5 showdow">
              <div class="col py-auto card border-0"> 
                  <div class="slide">
                    <img class="slide_img" src="{{asset('Image/Img1.jpg')}}" width="100%" alt="Image 1">
                  </div>
                  <div class="slide slide_two">
                    <img class="slide_img" src="{{asset('Image/Img2.jpg')}}" width="100%" alt="Image 1">
                  </div>
                  <div class="slide slide_three">
                    <img class="slide_img" src="{{asset('Image/Img3.jpg')}}" width="100%" alt="Image 1">
                  </div>

              </div>

              <div class="col m-5 showdow">
                <h3 class="text-center border-bottom pb-3">Contact Info</h3>
                <p class="m-3">Address: Jalan Tmu 1, Taman Tanjung Minyak Utama, 75250 Melaka</p>
                <p class="m-3">Phone: 06-3367970</p>
                <p class="m-3">Email: sktanjungminyak2@gamil.com</p>
                <p class="m-3">Facebook: <a href="https://www.facebook.com/sekolahkebangsaantanjungminyak2" target="blank">Click here</a> </p>
                <h3 class="text-center  border-bottom pb-3">Our Location</h3>
                <div id="map" class="mt-5 pt-5"></div>
              </div>
            </div>

            <div class="my-5"></div>
            <div class="mt-5">

            </div>


            <script>
              var map = L.map('map').setView([2.2681, 102.1940], 15);
              L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  attribution: '© Application Development Group 7'
              }).addTo(map);
              L.marker([2.2681, 102.1940]).addTo(map)
                  .bindPopup("<b>SK Tanjung Minyak 2 <br>Address: Jalan Tmu 1, Taman Tanjung Minyak Utama, 75250 Melaka</b> <br/> Email: sktanjungminyak2@gamil.com <br/> Phone no: 06-3367970")
                  .openPopup();
          </script>
          </div>
        </div>
    </div>

	<div class="footer text-center mt-4">
		<p>&copy; All rights reserved under us</p>
	</div>			

    {{-- JavaScript --}}
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>