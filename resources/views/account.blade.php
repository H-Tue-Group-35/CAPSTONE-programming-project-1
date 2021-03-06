<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script>
		var userid = sessionStorage.getItem("loginid");

		if (userid && userid != '') {

		} else {
			sessionStorage.loginid = '';
			window.location.href = 'login';
		}
	</script>

	<!-- Theme Made By www.w3schools.com - No Copyright -->
	<title>Car4All</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

	<!-- Used by CircleCI deplyed project -->
	<link rel="stylesheet" href="/public/css/account.css">

	<!-- Used by local testing -->
	<link rel="stylesheet" href="/css/account.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>

	<script>
		//sessionStorage.loginid = "none";

		var firebaseConfig = {
			apiKey: "AIzaSyC2ZMCg8GIWJeW1Y5n3cjsQ4Wk1fDM4J-8",
			authDomain: "car-for-all-273711.firebaseapp.com",
			databaseURL: "https://car-for-all-273711.firebaseio.com",
			projectId: "car-for-all-273711",
			storageBucket: "car-for-all-273711.appspot.com",
			messagingSenderId: "548693459929",
			appId: "1:548693459929:web:3b914dd957d24cf9358fc8"
		};

		firebase.initializeApp(firebaseConfig);
		var db = firebase.firestore();
	</script>

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
						<ul class="links nav navbar-nav navbar-right" id="fHeader">
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="row content">
			<div class="mapcontainer">
				<div class="map" id="map">
					<div class="main-block">
						<hr>
						<h1>Change Password</h1>
						<form method="post" action="password_change" name="form" id="form" autocomplete="off">
							@csrf
							<!-- {{ csrf_field() }} -->
							<hr>
							<label id="icon" for="name"><i class="fas fa-lock"></i></label>
							<input type="password" name="oldpassword" id="oldpassword" placeholder="Old Password" required />
							<label id="icon" for="name"><i class="fas fa-lock"></i></label>
							<input type="password" name="newpassword" id="newpassword" placeholder="New Password" required />


							<hr>
							<div class="btn-block">
								<button type="submit" class="button" style="width:fit-content"><span>Change password</span></button>
							</div>
						</form>
						<hr>
						<hr>
						<h1>Booking History</h1>
						<hr>
						<center>
							<table id="demo">
								<tr>
									<th>Brand</th>
									<th>Model </th>
									<th>Date</th>
								</tr>
								<script>
									var userid = sessionStorage.getItem("loginid");
									db.collection("Bookings").where("user", "==", userid).get().then(function(querySnapshot) {
										querySnapshot.forEach(function(booking) {

											var docRef = db.collection("Vehicles").doc(booking.data().carID);
											docRef.get().then(function(doc) {
												if (doc.exists) {
													document.getElementById("demo").innerHTML += "<tr><td>" + doc.data().brand + "</td><td>" + doc.data().model + "</td><td>" + booking.data().datefrom + " - " + booking.data().dateto + "</td></tr>";
												} else {
													// doc.data() will be undefined in this case
													console.log("No such document!");
												}
											}).catch(function(error) {
												console.log("Error getting document:", error);
											});


										});
									}).catch(function(error) {
										console.log("Error getting documents: ", error);
									});
								</script>

							</table>
							<hr>
						</center>
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
	</div>
	<script>
		var userid = sessionStorage.getItem("loginid");

		if (userid && userid != '') {
			document.getElementById("fHeader").innerHTML =
				'<li style="letter-spacing: 1px;float: right;padding-right: 20px;padding-top: 10px;">Logged in as ' + userid + '</li><hr><li><a href="account ">ACCOUNT</a></li><li><a href="logout ">LOGOUT</a></li>';
		} else {
			sessionStorage.loginid = '';
			document.getElementById("fHeader").innerHTML =
				'<li><a href="login">LOGIN</a></li><li><a href="register">REGISTER</a></li>';
		}
	</script>


</body>

</html>