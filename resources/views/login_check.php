<?php
session_start();

//Receive username from client side
$entered_username = $_POST['username'];
//Receive password from client side
$entered_password = $_POST['password'];

]);

	if (strcmp($entered_username,"TEST") === 0 && strcmp($entered_password,"TEST") === 0)
	{
		$_SESSION["loginSucc"] = False;
			// save name and key for later
		// password is correct, redirect to main page
		header('Location: main.php');
		exit();
	}
}
$_SESSION["loginSucc"] = True;
header('Location: login.php');

?>