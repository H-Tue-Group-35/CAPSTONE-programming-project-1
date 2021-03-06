<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/style.css" rel="stylesheet" type="text/css" >

	<title>Admin Control Panel</title>

	<!-- Connect to Firebase so we can get stats on all Vehicles -->
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!-- Jquery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

	<style>
		#title
		{
			font-size: 30px;
		}
		.mySlides
		{
			display: none;
		}
		#message
		{
			color: red;
			font-size: 2em;
			font-weight: 2em;
		}
		input
		{
			color: black;
			background: #292929;
			text-align: center;
		}
		ul
		{
			text-align: center;
		}

		body
		{
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

		h2
		{
			margin: 45px;
			font-family: "Roboto", sans-serif;
			font-weight: 2.5em;
			padding: 5px;
			font-size: 2.5em;
		}
	</style>

	<script>
		var firebaseConfig =
		{
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

		var markers = [];

		function initMap()
		{
			map = new google.maps.Map(document.getElementById('map'),
			{
				center: { lat: -37.806, lng: 144.954 },zoom: 12
			});

			infoWindow = new google.maps.InfoWindow;

			// Try HTML5 geolocation.
			if (navigator.geolocation) 
			{
				navigator.geolocation.getCurrentPosition(function(position)
				{
					console.log(position.coords.latitude);

					var pos =
					{
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};
					var marker = new google.maps.Marker
					({
						position: pos,
						map: map
					});
					map.setCenter(pos);
				},
				function()
				{
					handleLocationError(true, infoWindow, map.getCenter());
				});
			}
			else
			{
				// Browser doesn't support Geolocation
				handleLocationError(false, infoWindow, map.getCenter());
			}

			db.collection("Vehicles").get().then(function(querySnapshot)
			{
				querySnapshot.forEach(function(doc)
				{
					var coordinates =
					{
						lat: doc.data().location.latitude,
						lng: doc.data().location.longitude
					};
					if (doc.data().available)
					{
						var contentString =
						'<p style="text-align: center;"><span style="color: #000000;">Brand: ' +
						doc.data().brand + '</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">Model: ' +
						doc.data().model + '</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">Seats: ' +
						doc.data().seats + '</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">Available</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">&nbsp;</span></p>' +
						'<form onsubmit="">' +
						'<p style="text-align: center;"><input type="hidden" id="carID" name="carID" value="' +
						doc.id +
						'" ><button onclick="vehicleEmergency()" style="color: #000000;">Summon emergency services</button>' +
						'<button onclick="vehicleDeactivate()" style="color: #000000;">Deactivate</button>' +
						'<button onclick="vehicleDelete()" style="color: #000000;">Delete</button></p></form>';

						var carInfo = new google.maps.InfoWindow
						({ content: contentString });

						var carMarker = new google.maps.Marker
						({
							position: coordinates,
							map: map,
							icon: { url: "https://maps.google.com/mapfiles/kml/pal4/icon15.png" },
							id: doc.id
						});

						carMarker.addListener('click', function()
						{ carInfo.open(map, carMarker); });

						markers.push(carMarker);
					}
					else // if car is not available, show debug marker for now
					{
						var contentString = 
						'<p style="text-align: center;"><span style="color: #000000;">Brand: ' +
						doc.data().brand + '</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">Model: ' +
						doc.data().model + '</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">Seats: ' +
						doc.data().seats + '</span></p>' +	
						'<p style="text-align: center;"><span style="color: #000000;">Unavailable</span></p>' +
						'<p style="text-align: center;"><span style="color: #000000;">&nbsp;</span></p>' +
						'<form onsubmit="">' +
						'<p style="text-align: center;"><input type="hidden" id="carID" name="carID" value="' +
						doc.id +
						'" ><button onclick="vehicleEmergency()" style="color: #000000;">Summon emergency services</button>' +
						'<button onclick="vehicleActivate()" style="color: #000000;">Activate</button>' +
						'<button onclick="vehicleDelete()" style="color: #000000;">Delete</button></p></form>';

						var carInfo = new google.maps.InfoWindow
						({ content: contentString });

						var carMarker = new google.maps.Marker
						({
							position: coordinates,
							map: map,
							icon: { url: "https://maps.google.com/mapfiles/kml/pal3/icon45.png" },
							id: doc.id
						});

						carMarker.addListener('click', function()
						{ carInfo.open(map, carMarker); });

						markers.push(carMarker);
					}
				});
			}).catch(function(error)
			{
				console.log("Error getting documents: ", error);
			});
		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos)
		{
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
			var cID = document.getElementById('carID').value;

			// Set the car as active
			db.collection("Vehicles").doc(cID).update
			({
				"available": true
			})
			.then(function()
			{
				console.log("Car activated");
			});
		}
		function vehicleDeactivate()
		{
			var cID = document.getElementById('carID').value;

			// Set the car as inactive
			db.collection("Vehicles").doc(cID).update
			({
				"available": false
			})
			.then(function()
			{
				console.log("Car deactivated");
			});
		}
		function vehicleDelete()
		{
			var cID = document.getElementById('carID').value;

			db.collection("Vehicles").doc(cID).delete().then(function()
			{
				console.log("Vehicle deleted");
			}).catch(function(error)
			{
				console.error("Error deleting vehicle: ", error);
			});
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

			var vModel = document.getElementById('model').value;
			var vBrand = document.getElementById('fBrand').value;

			var vLat = document.getElementById('fLat').value;
			var vLong = document.getElementById('fLong').value;

			if (vLat == "" || vLong == "")
			{
			}
			else
			{
				randomLat = vLat;
				randomLong = vLong;
			}

			var vSeats = document.getElementById('fSeats').value;

			db.collection("Vehicles").add
			({
				available: true,
				booked: false,
				//image: "https://firebasestorage.googleapis.com/v0/b/car-for-all-273711.appspot.com/o/Car%20Pictures%2Fcorolla.png?alt=media&token=84eb8d77-91a4-469a-b502-78fdac83ae6a",
				location: new firebase.firestore.GeoPoint(randomLat, randomLong),
				model: vModel,
				brand: vBrand,
				seats: vSeats
			});

		}

		var aVehicles = [];
		var aVehiclesLocations = [];

		// loop through all vehicles and snap the coordinates to the road.
		function updateVehicleCoords()
		{
			// loop through array and update markers.
			for (i = 0; i < aVehiclesLocations.length; i++)
			{
				//console.log("Put marker: "+aVehiclesLocations[i]);
				//markers[i].setPosition(aVehiclesLocations[i]);
			}

			aVehicles = [];
			aVehiclesLocations = [];

			db.collection("Vehicles").get().then(function(querySnapshot)
			{
				querySnapshot.forEach(function(doc)
				{
					var coordinates =
					{
						lat: doc.data().location.latitude,
						lng: doc.data().location.longitude
					};

					//if (doc.data().booked)
					if (doc.data().available) // for demo purposes we will move all cars
					{
						// move the car around
						// Generate random variance from 0 to 0.0015
						var randomLatVariance = (Math.random() * 0.0015);
						var randomLngVariance = (Math.random() * 0.0015);

						// 50% chance of making the coords negative
						if (Math.random() >= 0.5) // flip lat
						{
							randomLatVariance = -randomLatVariance;
						}
						if (Math.random() >= 0.5) // flip long
						{
							randomLngVariance = -randomLngVariance;
						}
						console.log("moving car around");

						coordinates.lat += randomLngVariance;
						coordinates.lng += randomLngVariance;
					}
					else
					{
					}

					// snap the coordinates to the nearest road
					var coordString = coordinates.lat.toString() + "," + coordinates.lng.toString();
					console.log("Snapping: "+coordString);

					$.get('https://roads.googleapis.com/v1/snapToRoads',
					{
						interpolate: false,
						key: "AIzaSyAFZBF28p1IJCd8JiC1BaV8aNCSYJq6fEo",
						path: coordString
					},
					function(data)
					{
						// for some reason setMarker uses latlng, but snapToRoads uses LatitudeLongitude...
						
						//console.log("Snapped location: "+data.snappedPoints[0].location);
						console.log("Snapped location lat: "+data.snappedPoints[0].location.latitude);
						console.log("Snapped location lng: "+data.snappedPoints[0].location.longitude);
						
						data.snappedPoints[0].location.lat=data.snappedPoints[0].location.latitude;
						data.snappedPoints[0].location.lng=data.snappedPoints[0].location.longitude;


						aVehicles.push(doc.id);
						aVehiclesLocations.push(data.snappedPoints[0].location);
						db.collection("Vehicles").doc(doc.id).update({"location": data.snappedPoints[0].location});
						
						
						// loop through array and update markers.
						for (i = 0; i < markers.length; i++)
						{
							console.log("Marker id: "+markers[i].id);
							if ( markers[i].id == doc.id )
							{
								console.log("MATCH. Put marker");
								markers[i].setPosition(data.snappedPoints[0].location);
							}

						}
						
					});
					console.log("End of snap func");
				});
			}).catch(function(error)
			{
				console.log("Error getting documents: ", error);
			});
		}

		function updateMarkers()
		{

		}

		//periodically update map to update vehicle positions and status
		function updateLoop()
		{
			// update markers
			console.log("update loop");

			// snap the vehicles to the road and update the markers.
			updateVehicleCoords();
		}

		// Main interval function to keep track of application state
		// interval shouldn't be too often to allow time for database updates and whatnot.
		var interval = setInterval(updateLoop, 5000);

		// Get distance between two geopoints
		function getDistance (lat1, lng1, lat2, lng2 ) 
		{
			var earthRadius = 3958.75;
			var dLat = toRadians(lat2-lat1);
			var dLng = toRadians(lng2-lng1);
			var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
			Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
			Math.sin(dLng/2) * Math.sin(dLng/2);
			var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
			var dist = earthRadius * c;

			var meterConversion = 1609.0;

			return dist * meterConversion;
		}
		function toRadians(degrees)
		{
			var pi = Math.PI;
			return degrees * (pi/180);
		}		

	</script>



	<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap">
	</script>

</head>

<!-- Wrapper -->
<div id="wrapper">
<body>
<div class="center">

	<h1>Admin Control Panel</h1>

	<br>
	<br>

	<h2>Add new vehicle</h2>

	<form onsubmit="makeVehicle()">
	<div class="field half">
	Brand: <input type="text" name="fBrand" id="fBrand" maxlength="12" required>
	</div>
	<div class="field half">
	Model: <input type="text" name="model" id="model" maxlength="12" required>
	</div>
	<div class="field half">
	Seats: <input type="number" id="fSeats" name="fSeats" min="1" max="12" value="5" required>
	</div>
	<div class="field half">
	Coordinates (leave empty for random): <input type="text" name="fLat" id="fLat" maxlength="12">
	<input type="text" name="fLong" id="fLong" maxlength="12">
	</div>
	<div class="field half">
	Status:
	<select id="fStatus" name="fStatus">
	<option value="fActive">Active</option>
	<option value="fInactive">Inactive</option>
	</select>
	</div>

	<br/>
	<input type="submit">
	</form>
	</div>

	<h2>Vehicle map</h2>

	<div id="map" style="height:800px;"></div>

</div>
</body>
</div>
</html>