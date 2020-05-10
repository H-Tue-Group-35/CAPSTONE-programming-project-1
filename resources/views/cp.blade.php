<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css" >
	
    <title>Admin Control Panel</title>
	
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
            zoom: 17
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


                var markers = []
                console.log(typeof(markers));


                db.collection("Vehicles")
                    .get()
                    .then(function(querySnapshot) {
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
                                    '<p style="text-align: center;"><button><span style="color: #000000;">Summon emergency services</span> </button></p>';

                                var carInfo = new google.maps.InfoWindow({
                                    content: contentString
                                });

                                var carMarker = new google.maps.Marker({
                                    position: coordinates,
                                    map: map,
                                    icon: {
                                        url: "http://maps.google.com/mapfiles/kml/pal4/icon15.png"
                                    }
                                });
                                carMarker.addListener('click', function() {
                                    carInfo.open(map, carMarker);
                                });

                                markers.push(carMarker);
                            } else // if car is not available, show debug marker for now
                            {
                                var coordinates = {
                                    lat: doc.data().location.latitude,
                                    lng: doc.data().location.longitude
                                };

                                var contentString =
                                    '<p style="color: #000000;">This is debug code to show unavailable cars</p>';

                                var carInfo = new google.maps.InfoWindow({
                                    content: contentString
                                });

                                var carMarker = new google.maps.Marker({
                                    position: coordinates,
                                    map: map,
                                    icon: {
                                        url: "http://maps.google.com/mapfiles/kml/pal3/icon45.png"
                                    }
                                });
                                carMarker.addListener('click', function() {
                                    carInfo.open(map, carMarker);
                                });

                                markers.push(carMarker);
                            }
                        });
                    })
                    .catch(function(error) {
                        console.log("Error getting documents: ", error);
                    });

            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
	
	
	function makeVehicle()
	{
		alert("car added to db");
		var db = firebase.firestore();
		const firebaseAdmin = require('firebase-admin');

		new GeoPoint ( latitude :  number ,  longitude :  number ) : GeoPoint

		db.collection("Vehicles").add({
		available: "true",
		image: "https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Fcorolla.png?alt=media&token=84eb8d77-91a4-469a-b502-78fdac83ae6a",
		myLocation: new firebaseAdmin.firestore.GeoPoint(0,0),
		model: 'test',
		seats: 5
		});
	}
	
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap">
    </script>
	
</head>

<body>

    <h1>Admin Control Panel</h1>
	
	<h2>Fleet Status</h2>
	
	<h2>Make new Vehicle (also random option)</h2>
	
	<button onclick="makeVehicle()">Make vehicle</button>
	
	<h2>Emergency map</h2>
	
	<div id="map" style="height:800px;"></div>

</body>
</html>