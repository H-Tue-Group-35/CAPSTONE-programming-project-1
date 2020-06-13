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
	<?php
		use Google\Cloud\Firestore\FirestoreClient;

		function initialize()
		{
			// Create the Cloud Firestore client
			$db = new FirestoreClient();
			//printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);
			
			// $docRef = $db->collection('post')->document('lovelace2');
			// $docRef->set([
			// 'first' => 'Ada',
			// 'last' => 'Lovelace',
			// 'born' => 1815
			// ]);
			//printf('Added data to the lovelace document in the users collection.' . PHP_EOL);


			$docRef = $db->collection('post')->document($_POST['username']);
			$snapshot = $docRef->snapshot();

			if ($snapshot->exists())
			{
				printf("Error: This user already exists. Try again. Back to home.");
			}
			else
			{
				printf("User does not exist, making account.");
				
				
				$docRef->set
				([
					'username' => $_POST['username'],
					'password' => 'password'
				]);
				
			}

		}
		
		initialize();
	?>
</body>


	
</html>