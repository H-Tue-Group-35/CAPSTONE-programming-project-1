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

	<title>Checking login</title>

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
</head>
<body>

	<?php
		use Google\Cloud\Firestore\FirestoreClient;
		
		$userToken = Session::get('variableName');

		//Create the Cloud Firestore client
		$db = new FirestoreClient();

		$docRef = $db->collection('user')->document($userToken);
		$snapshot = $docRef->snapshot();


		if ($snapshot->exists())
		{

		}
		else
		{	
			printf("Error: Invalid username or password. <a href='account'>Try again</a>. <a href=''>Back to index</a>.");
		}
	?>

</body>
</html>