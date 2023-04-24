<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                            {{-- <li><a href="https://www.facebook.com/sekolahkebangsaantanjungminyak2/?locale=ms_MY"><i class="fab fa-facebook-f icon-position"></i></a></li> --}}
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
                          </ul>
                        </div>
                      </nav>
				</div>
			</div>
		</div>
	</div>

    {{-- Image background with text --}}
    <div class="imgcontainer">
        <img src="{{asset('Image/book.jpg')}}" class="imgbackground" alt="Book">
            <div class="text1">
                <h1><b>Welcome to our library</b></h1>
            </div>
            <div class="text2">
                <h3>we stand behind your success</h3>
            </div>
            {{-- <div class="row"> --}}
            <div  class="text3 student-reg"><a href="{{route('student.register')}}">student registration</a></div>
                {{-- <div class="col-5 teacher-reg"><a href="teacher/registration.php">teacher registration</a></div>
            </div> --}}
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