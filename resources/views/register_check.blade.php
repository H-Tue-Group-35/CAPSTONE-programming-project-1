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

			$docRef = $db->collection('post')->document($_POST['username']);
			$snapshot = $docRef->snapshot();

			if ($snapshot->exists())
			{
				printf("Error: This user already exists. <a href='login'>Try again</a>. <a href=''>Back to index</a>.");
			}
			else
			{
				//printf("User does not exist, making account.");
				
				
				$docRef->set
				([
					'username' => $_POST['username'],
					'password' => $_POST['password']
				]);
				
				printf("Account created successfully. You may now <a href='login'>login</a>.");
				
			}

		}
		
		initialize();
	?>
</body>


	
</html>