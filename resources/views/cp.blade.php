<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
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
            zoom: 14
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
                                    '<form onsubmit="test()">' +
                                    '<p style="text-align: center;"><input type="hidden" name="carID" value="' +
                                    doc.id +
                                    '" ><button onclick="vehicleEmergency()">Summon emergency services</button>' +
									'<button onclick="vehicleDeactivate()">Deactivate</button>' +
									'<button onclick="vehicleDelete()">Delete</button></p></form>';

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
                                    '<form onsubmit="test()">' +
                                    '<p style="text-align: center;"><input type="hidden" name="carID" value="' +
                                    doc.id +
                                    '" ><button onclick="vehicleEmergency()">Summon emergency services</button>' +
									'<button onclick="vehicleActivate()">Activate</button>' +
									'<button onclick="vehicleDelete()">Delete</button></p></form>';

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
	
	function vehicleEmergency()
	{
		alert("Emergency services summoned.");
	}
	function vehicleActivate()
	{
		alert("activate vehicle" + document.getElementById('carID').value);
	}
	function vehicleDeactivate()
	{
		alert("deactivate vehicle" + document.getElementById('carID').value);
	}
	function vehicleDelete()
	{
		alert("delete vehicle" + document.getElementById('carID').value);
	}

	/*
		This adds the vehicle to the database. If coordinate fields are
		empty it puts the vehicle randomly in the city
	*/
	function makeVehicle()
	{
		/* Random lat and long should use following range:
		
			Lat
			-37.787222
			-37.831706
			range: 0.044484

			Long
			144.964875
			144.923676
			range: 0.041199
			
			Math.random() generates random value from 0-1
		*/
		
		//alert("Car added to database");

		// Generate random coords
		var randomLat = (Math.random() * 0.044484)-37.831706;
		var randomLong = (Math.random() * 0.041199)+144.923676;
		
		//alert("Random coords: "+randomLat+", "+randomLong);
		
		var vModel = document.getElementById('model').value;
		var vBrand = document.getElementById('fBrand').value;
		
		var vLat = document.getElementById('fLat').value;
		var vLong = document.getElementById('fLong').value;
		
		if (vLat == "" || vLong == "")
		{
			alert("Vehicle placed at random coordinates: "+randomLat+", "+randomLong);
		}
		else
		{
			alert("Vehicle added to map.");
			randomLat = vLat;
			randomLong = vLong;
		}
		
		var vSeats = document.getElementById('fSeats').value;

		db.collection("Vehicles").add
		({
			available: "true",
			image: "https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Fcorolla.png?alt=media&token=84eb8d77-91a4-469a-b502-78fdac83ae6a",
			/* myLocation: new firebaseAdmin.firestore.GeoPoint(0,0), */
			location: new firebase.firestore.GeoPoint(randomLat, randomLong),
			model: vModel,
			brand: vBrand,
			seats: fSeats
		});
		
	}
	
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap">
    </script>
	
	<style>
		.container {
		  width: 200px;
		}

		.container input {
		  width: 100%;
		}
		.container select {
		  width: 100%;
		}

	</style>
	
</head>

<body>

	<h1>Admin Control Panel</h1>

	<h2>Fleet Status</h2>
	
	<p>List all vehicles here for easy management. Add ability to make active/inactive or delete.</p>

	<h2>Make new Vehicle (empty coordinates will give random position in city)</h2>
	<div class="container">
	<form onsubmit="makeVehicle()">
	Brand: <input type="text" name="fBrand" id="fBrand" maxlength="12" required>
	<br/>
	Model: <input type="text" name="model" id="model" maxlength="12" required>
	<br/>
	Seats: <input type="number" id="fSeats" name="fSeats" min="1" max="12" value="5" required>
	<br/>
	Coordinates: <input type="text" name="fLat" id="fLat" maxlength="12">
				 <input type="text" name="fLong" id="fLong" maxlength="12">
	<br/>
	Status:
	<select id="fStatus" name="fStatus">
	  <option value="fActive">Active</option>
	  <option value="fInactive">Inactive</option>
	</select>

	<br/>
	<input type="submit">
	</form>
	</div>

	<br/>

	<h2>Vehicle map</h2>
	<p>Delete vehicles or summon emergency services.</p>

	<div id="map" style="height:800px;"></div>

</body>
</html>