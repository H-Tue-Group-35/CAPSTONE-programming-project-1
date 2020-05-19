<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- include firebase -->
	<script src="https://www.gstatic.com/firebasejs/7.14.3/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-firestore.js"></script>
	
    <title>Registering</title>
</head>




<body>
Registering...
</body>

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

	db.collection("Users").add
	({
		Username: "TEST",
		Payment: "none",
		Password: "PASSWORD",
		Phone: "none"
	})
	.then(function()
	{
		console.log("Document successfully written!");
	})
	.catch(function(error)
	{
		console.error("Error writing document: ", error);
	});
	
	</script>
	
</html>