<?php
session_start();
ob_start();

$_SESSION["login_id"] = "TEST";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/style.css" rel="stylesheet" type="text/css">

    <title>Car4Alll</title>


    <!-- Connect to Firebase so we can get stats on all Vehicles -->
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>

    <script>
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
                        '" ><input type="submit" value="Submit" style="background-color: #DE6247;" /></p></form>';

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

<header style="text-align:right">
<?php
    if (isset($_SESSION['login_id']))
	{
        echo ("Logged in as "+$_SESSION['login_id']);
    }
	else
	{
		echo ('<a href="login">[Login]</a> <a href="register">[Login]</a>');
	}


?>
</header>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <style>
        #title {
            font-size: 30px;

        }
        </style>

        <!-- Banner -->
        <section id="banner" class="major">
            <div class="inner">
                <header class="major">
                    <center>
                        <h1 id="title">CAR4ALLL</h1>
                    </center>
                </header>
            </div>
        </section>

        <div class="center">
            <nav>
                <ul>
                    <style>
                    .center {
                        text-align: center;
                    }


                    .navbar {
                        text-align: center;
                        display: inline;
                        margin: 0;
                        padding: 10px;
                        font-family: "Source Sans Pro", Helvetica, sans-serif;
                        font-size: 1.7em;
                        color: black;

                    }
                    </style>
                    <li class="navbar"><a href="transactionhistory">Transaction History</a></li>
                    <li class="navbar"><a href="contact">Contact</a></li>
                    <li class="navbar"><a href="admin">Admin login</a></li>

                </ul>
            </nav>
        </div>

        <br>
        <br>

        <div class="center">
            <img src="https://i.ibb.co/3y5cmS9/c1e88dfc-d1a1-467d-ab8c-9a08b4434d36-200x200.png" alt="">

        </div>
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Locate Your Nearest vehicle</h2>

                </header>
                <div id="map" style="height:800px;"></div>
            </div>
        </section>

    </div>

    <br>
    <br>

    <section>


        <div class="center">
            <br>
            <h2>Compare Rates to Find a Top Car Hire in Melbourne</h2>
            <img src="https://cdn.motor1.com/images/mgl/rg2XY/s3/happy-family-driving-in-car.jpg" alt="">



            < </div>



    </section>

</body>



</html>