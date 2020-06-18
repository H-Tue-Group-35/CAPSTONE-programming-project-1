<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Used by CircleCI deplyed project -->
    <link rel="stylesheet" href="/public/css/login.css">

    <!-- Used by local testing -->
	<link rel="stylesheet" href="/css/login.css">
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>

</head>

<body>
    <div class="box">
        <div class="row header">
            <!-- Navbar -->
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="/">
                            <img class="logo" id="logopic" src="https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Flogo.png?alt=media&token=49b7996f-637c-460d-844e-22633123798d">
                        </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="links nav navbar-nav navbar-right">
                            <li><a href="login">LOGIN</a></li>
                            <li><a href="register">REGISTER</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row content">
            <div class="mapcontainer">
                <div class="map" id="map">
                    <div class="main-block">
                        <h1>Login</h1>
						<form method="post" action="login_check" name="form" id="form" autocomplete="off">
							@csrf <!-- {{ csrf_field() }} -->
                            <hr>
                            <label id="icon" for="name"><i class="fas fa-user"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" required />
                            <label id="icon" for="name"><i class="fas fa-lock"></i></label>
                            <input type="password" name="password" id="password" placeholder="Password" required />


                            <hr>
                            <div class="btn-block">
                                <button type="submit" class="button"><span>Login</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer">
                <!-- Footer -->
                <footer class="container-fluid bg-4 text-center" style="padding:10px">
                    <p>© 2020 Copyright: H-Tue-Group-35</p>
                </footer>
        </div>


</body>

</html>