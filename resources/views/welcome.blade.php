<?php
session_start();
ob_start();
//Session::put('login_id', 'ayaya');
//$request->session()->put('login_id', 'value');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="/style.css" rel="stylesheet" type="text/css">
    <title>Car4All</title>


    <!-- Connect to Firebase so we can get stats on all Vehicles -->
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

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
            document.getElementById("fHeader").innerHTML = 'Logged in as ' + userid + ' <a href="logout">[Logout]</a>';
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

<header id="fHeader" style="text-align:right">
</header>

<body class="is-preload">

    <?php

$_SESSION["login_id"] = "TEST";
?>

    <!-- Wrapper -->
    <div id="wrapper">

        <style>
        #title {
            font-size: 30px;

        }

        .mySlides {
            display: none;

        }
        </style>

        <!-- Banner -->
        <section id="banner" class="major">
            <div class="inner">
                <header class="major">
                    <div class="center">

                        <div class="carlogo">
                            <img class="animate__backInDown" id="logopic"
                                src="https://i.ibb.co/3y5cmS9/c1e88dfc-d1a1-467d-ab8c-9a08b4434d36-200x200.png" alt="">

                        </div>
                    </div>


                    <style>
                    .carlogo {}
                    </style>
                </header>
            </div>
        </section>




        <nav class="#1565c0 blue darken-3">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">Car4All</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="transactionhistory">Transaction History</a></li>
                    <li><a href="contact">Contact</a></li>
                    <li><a href="admin">Admin login</a></li>
                </ul>
            </div>
        </nav>
        <div class="center">





            <section id="two">
                <div class="inner">
                    <header class="center">
                        <h2 class="major animate__animated animate__bounce">Locate Your Nearest vehicle</h2>

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
                <h2 class="animate__animated animate__bounce">Compare Rates to Find a Top Car Hire in Melbourne</h2>

                <!-- <img src="https://cdn.motor1.com/images/mgl/rg2XY/s3/happy-family-driving-in-car.jpg" alt=""> -->


                <div class="w3-content w3-section" style="max-width:1000px">
                    <img class="mySlides"
                        src="https://cdn.motor1.com/images/mgl/rg2XY/s3/happy-family-driving-in-car.jpg"
                        style="width:100%">
                    <img class="mySlides"
                        src="https://blackgunownersassociation.org/wp-content/uploads/2018/02/black-gun-owners-association-auto-home-motorcycle-insurance.jpg"
                        style="width:100%">
                    <img class="mySlides"
                        src="https://image.freepik.com/free-photo/asian-women-driving-car-smile-happily-with-glad-positive-expression-during-drive-travel-journey-people-enjoy-laughing-transport-relaxed-happy-woman-roadtrip-vacation-concept_41350-454.jpg"
                        style="width:100%">
                </div>
                <br>
                <script>
                var myIndex = 0;
                carousel();

                function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    myIndex++;
                    if (myIndex > x.length) {
                        myIndex = 1
                    }
                    x[myIndex - 1].style.display = "block";
                    setTimeout(carousel, 2000); // Change image every 2 seconds
                }
                </script>




                < </div>



        </section>

        <script>
        initHeader();
        </script>

        <style>
        ul {
            text-align: center;
        }

        body {
            background: #8e9eab;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right,
                    #eef2f3,
                    #8e9eab);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right,
                    #eef2f3,
                    #8e9eab);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            color: black;
        }

        h2 {

            margin: 45px;
            font-family: "Roboto", sans-serif;
            font-weight: 2.5em;
            padding: 5px;
            font-size: 2.5em;

        }





        /* .carlogo {
            background: white;
        } */
        </style>



</body>

<footer class="page-footer #1565c0 blue darken-3">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.
                </p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2020 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

</html>