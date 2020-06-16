<?php
session_start();
ob_start();
//Session::put('login_id', 'ayaya');
//$request->session()->put('login_id', 'value');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Car4All</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>


  <link rel="stylesheet" href="{{ URL::asset('assets/css/homepage.css') }}">

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
    var map, infoWindow;

    function initHeader() {

        var userid = sessionStorage.getItem("loginid");

        if (userid && userid != '') {
            document.getElementById("fHeader").innerHTML = 'Logged in as ' + userid + ' <a href="account">[Account]</a> <a href="logout">[Logout]</a>';
        } else {
            sessionStorage.loginid = '';
            document.getElementById("fHeader").innerHTML =
                '<a href="login">[Login]</a> <a href="register">[Register]</a>';
        }

    }

    function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: -37.806,
                lng: 144.954
            },
            zoom: 12
        });

        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                    console.log(position.coords.latitude);

                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    var marker = new google.maps.Marker({
                        position: pos,
                        map: map
                    });
                    map.setCenter(pos);
                },
                function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }

        var markers = []
        console.log(typeof(markers));

        db.collection("Vehicles").get().then(function(querySnapshot) {
            querySnapshot.forEach(function(doc) {
                if (doc.data().available) {
                    var coordinates = {
                        lat: doc.data().location.latitude,
                        lng: doc.data().location.longitude
                    };

                    var contentString =
                        '<p><span style="color: #000000;"><img style="display: block; margin-left: auto; margin-right: auto;" src="' +
                        doc.data().image +
                        '" alt="" width="246" height="138" /></span></p>' +
                        '<p style="text-align: center;"><span style="color: #000000;">Brand: ' +
                        doc.data().brand + '</span></p>' +
                        '<p style="text-align: center;"><span style="color: #000000;">Model: ' +
                        doc.data().model + '</span></p>' +
                        '<p style="text-align: center;"><span style="color: #000000;">Seats: ' +
                        doc.data().seats + '</span></p>' +
                        '<p style="text-align: center;"><span style="color: #000000;">Available!</span></p>' +
                        '<p style="text-align: center;"><span style="color: #000000;">&nbsp;</span></p>' +
                        '<form method="post" action="booking">' +
                        '<p style="text-align: center;"><input type="hidden" name="carID" value="' +
                        doc.id +
                        '" ><input type="submit" value="Book Now" style="background-color: #DE6247;" /></p></form>';

                    var carInfo = new google.maps.InfoWindow({
                        content: contentString
                    });

                    var carMarker = new google.maps.Marker({
                        position: coordinates,
                        map: map,
                        icon: {
                            url: "https://maps.google.com/mapfiles/kml/pal4/icon15.png"
                        }
                    });

                    carMarker.addListener('click', function() {
                        carInfo.open(map, carMarker);
                    });

                    markers.push(carMarker);
                } else // if car is not available, do not display it to customer
                {}
            });
        }).catch(function(error) {
            console.log("Error getting documents: ", error);
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap">
    </script>



</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <img class="logo" id="logopic" src="https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Flogo.png?alt=media&token=49b7996f-637c-460d-844e-22633123798d">
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">LOGIN</a></li>
          <li><a href="#">REGISTER</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="mapcontainer">
    <div class="map" id="map">

    </div>
  </div>


  <!-- Footer -->
  <footer class="container-fluid bg-4 text-center" style="padding:10px">
    <p>Bootstrap Theme</p>
  </footer>

</body>

</html>