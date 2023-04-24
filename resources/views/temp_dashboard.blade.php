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
        <link rel="stylesheet" href="{{url('css/dashboard.css')}}"> 

</head>
<div class="main-content">
    <div class="wrapper">
        <div class="left-sidebar">
            <div class="p-title">
                <h3><a href=""><i class="fas fa-book"></i><span>Pocket Library</span></a></h3>
            </div>
            <div class="gap-40"></div>
            <div class="profile">
                <div class="profile-pic">
                     <img src="{{asset('Image/man.png')}}" alt="man.png">
                    {{-- <img src="{{asset(Image/man.png)}}" height="" width="" alt="something wrong" class="rounded-circle"> --}}
                </div>
                <div class="profile-info text-center">
                    <span>Welcome!</span>
                    <h2>LIM ZENG KAI</h2>
                </div>
            </div>
            <div class="gap-30"></div>
            <div class="sidebar-menu">
                <h3>General</h3>
                <div class="border"></div>
                <ul>
                    <li class="menu active ?>">
                          <a href="dashboard.php"><i class="fas fa-home"></i>Dashboard</a>
                    </li>
                    <li class="menu menu-toggle1">
                          <a href="#"><i class="fas fa-id-card"></i>My profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="menus1">
                            <li><a href="changepass.php">change password</a></li>
                            <li><a href="profile.php">profile</a></li>
<!--                                <li><a href="notifications.php">Messages</a></li>-->
                        </ul>
                       </li>
                    <li class="menu active ?>">
                          <a href="my-issued-books.php"><i class="fas fa-book"></i>my issued books</a>
                    </li>
                    <li class="menu">
                          <a href="books.php"><i class="fas fa-book"></i>books</a>
                    </li>	       	                    
                    <li class="menu">
                          <a href="request-book.php"><i class="fas fa-book"></i>request book</a>
                    </li>	                    
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="inner">
                <div class="heading text-center">
                    <h3>Library Management System</h3>
                </div>
                <div class="header-profile text-right">
                    <ul>
                        <li class="icon">
                            <a href="notifications.php" ><i class="fas fa-bell"></i></a>
                            {{-- <span class="count" onclick="window.location='notifications.php'"><b><?php echo $not; ?></b></span> --}}

                        </li>
                        {{-- <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('Image/man.png')}}" alt="" alt="man.png"><span>LIM ZENG KAI</span></a> 
                            <ul class="dropdown-menu">
                                <li class="user-header text-center">
                                    <img <img src="{{asset('Image/man.png')}}" alt="" alt="man.png">
                                    <p>LIM ZENG KAI - Student</p>
                                </li>
                                <li class="user-footer">
                                    <ul>
                                        <li>
                                            <a href="profile.php">profile</a>
                                        </li>
                                        <li>
                                            <a href="logout.php">logout</a>
                                        </li>
                                    </ul>
                                </li>														
                            </ul>
                        </li> --}}
                        <li class="dropdown show">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('Image/man.png')}}" alt="" alt="man.png"><span>LIM ZENG KAI</span></a> 
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </ul>
                        </li>
                    </ul>
                </div>															
            </div>

        {{-- Dashboard --}}
        <div class="dashboard-content">
            <div class="dashboard-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left">
                                <p><span>dashboard</span>User panel</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right text-right">
                                <a href="dashboard.php"><i class="fas fa-home"></i>home</a>
                                <span class="disabled">my issued books</span>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="st-issuedBook">
                                <table id="dtBasicExample" class="table table-dark table-striped text-center">
                                    <thead>
                                    <tr>
                                            <th>Reg No</th>
                                            <th>Username</th>
                                            <th>Books Name</th>
                                            <th>Books Issue Date</th>
                                            <th>Books Return Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- <?php 
                                        $res= mysqli_query($link, "select * from issue_book where username='".$_SESSION['student']."' ORDER BY id DESC");
                                        while ($row=mysqli_fetch_array($res)) {
                                            echo "<tr>";
                                            echo "<td>"; echo $row["regno"]; echo "</td>";
                                            echo "<td>"; echo $row["username"]; echo "</td>";
                                            echo "<td>"; echo $row["booksname"]; echo "</td>";
                                            echo "<td>"; echo $row["booksissuedate"]; echo "</td>";
                                            echo "<td>"; echo $row["booksreturndate"]; echo "</td>";
                                            echo "</tr>";
                                        }
                                    ?> --}}
                                </tbody>
                                </table>
                            </div>	
                        </div>
                    </div>
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