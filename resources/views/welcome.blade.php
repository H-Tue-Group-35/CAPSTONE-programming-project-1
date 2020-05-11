<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Car4All</title>
	
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
                var marker = new google.maps.Marker({
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

		var markers = []
		console.log(typeof(markers));

		db.collection("Vehicles").get().then(function(querySnapshot)
		{
			querySnapshot.forEach(function(doc)
			{
				if (doc.data().available)
				{
					var coordinates =
					{
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

					var carInfo = new google.maps.InfoWindow
					({ content: contentString });

					var carMarker = new google.maps.Marker
					({
						position: coordinates,
						map: map,
						icon: { url: "http://maps.google.com/mapfiles/kml/pal4/icon15.png" }
					});
					
					carMarker.addListener('click', function()
					{ carInfo.open(map, carMarker); });

					markers.push(carMarker);
				}
				else // if car is not available, do not display it to customer
				{
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
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO-dbFSEA8jv-SxqQqhXELgftWtmIN7D4&callback=initMap">
    </script>
</head>

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
                        <h1 id="title">CAR4ALL</h1>
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

                    }
                    </style>

                    <li class="navbar"><a href="contact">Contact</a></li>
                    <li class="navbar"><a href="login">Login</a></li>
                    <li class="navbar"><a href="admin">Admin login</a></li>
                </ul>
            </nav>
        </div>
		
        <!-- Main -->
        <div id="main">

            <!-- Two -->
            <section id="two">
                <div class="inner">
                    <header class="major">
                        <h2>About us</h2>
                    </header>
                    <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna
                        magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna.
                        Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem
                        consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus
                        amet pharetra et feugiat tempus.</p>
                    <ul class="actions">
                        <li><a href="about.php" class="button next">Read more</a></li>
                    </ul>
                </div>
            </section>



        </div>

        <!-- inquiry -->
        <section id="contact">
            <div class="inner">
                <section class="split">
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-envelope"></span>
                            <h3>Email</h3>
                            <a href="#">carrentalwebsite@untitled.tld</a>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-phone"></span>
                            <h3>Phone</h3>
                            <span>(000) 000-0000 x12387</span>
                            <br>
                            <span>(000) 000-0000 x12387</span>
                        </div>
                    </section>
                    <section>
                        <div class="contact-method">
                            <span class="icon alt fa-home"></span>
                            <h3>Address</h3>
                            <span>1234 Somewhere Road #5432<br />
                                Melbourne, TN 00000<br />
                                Australia</span>
                        </div>
                    </section>
                    <section>
                        <h3>Terms</h3>

                        <div class="box">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam quasi molestiae quo
                                repudiandae repellat dolore impedit alias soluta, excepturi aperiam aliquid numquam
                                dignissimos nulla exercitationem vel, fuga accusamus voluptate, ipsa quia. Possimus odit
                                ipsam deleniti nisi soluta voluptas! Nemo aperiam dignissimos, nisi. Necessitatibus cum
                                quos dolor incidunt! Ab voluptatum sapiente voluptas fuga in rem voluptatibus rerum
                                ipsam eos dolorem aspernatur saepe incidunt provident nihil, quos ad perspiciatis est
                                voluptatem commodi. Repellat dolores, ipsam facere ipsum, cumque deleniti perferendis
                                delectus consequatur harum fuga et architecto vitae neque suscipit. Aut vero architecto
                                non maxime molestiae autem dolores, corporis, molestias esse voluptatum nobis error
                                minima deserunt provident consectetur. Qui, ipsa assumenda voluptatum asperiores
                                laudantium nobis harum sint quis sed quia, officiis odit eaque a! Quos provident eos
                                earum facilis nam consequuntur reiciendis amet sunt? Quia, quasi sunt. Aliquam labore
                                vitae, officiis ullam itaque. Id non est earum praesentium incidunt officia quos modi at
                                suscipit quibusdam. Id nostrum beatae ea atque, fugiat mollitia, eius, sed eos quidem
                                itaque inventore hic reiciendis quas doloremque illum. Enim eum labore odio alias.
                                Consectetur molestias, suscipit, animi amet enim eius, voluptates nulla sapiente earum
                                tenetur explicabo iusto ad officiis! Praesentium minus illo saepe voluptatibus
                                obcaecati, excepturi, sit nam quaerat ab velit deserunt tenetur magni quae temporibus!
                                Iusto sapiente iste eos, ipsa dolores obcaecati voluptas commodi, nesciunt officiis at
                                quis magni quos, ducimus ad. Minus dicta blanditiis voluptatum ipsa, voluptatem sequi
                                eligendi nam est possimus libero aliquam, eos provident repellendus dolores. Distinctio
                                corrupti ea ipsam, dolore, dolorem similique eos illo iure ad maxime, cumque doloribus
                                iusto expedita quidem accusantium cum, voluptatibus ducimus! Neque eos cupiditate at
                                molestias sequi enim! Amet nesciunt dolorem quisquam sunt ad quos fugit at alias
                                distinctio nihil nostrum, itaque a repudiandae soluta dicta quasi, repellat quidem
                                autem. Architecto, esse porro iure repellat sed. Quidem?</p>
                        </div>
                    </section>
                </section>
            </div>
        </section>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <ul class="icons">
                    <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon alt fa-pinterest"><span class="label">Pinterest</span></a></li>
                    <li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
                    <li><a href="#" class="icon alt fa-google-plus"><span class="label">Google plus</span></a></li>
                </ul>
                <ul class="copyright">
                    <li>&copy; 2018 <a href="#">Car Rental Company Ltd</a> | All rights reserved.</li>
                    <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
                </ul>
            </div>
        </footer>

    </div>

</body>

</html>
