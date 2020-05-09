<?php
session_start();
ob_start();

	if (strcmp($username,"admin") === 0 && strcmp($password,"admin") === 0)
	{
		// password is correct, redirect to cp
		header('Location: https://car-for-all-273711.appspot.com/cp');
		exit();
	}

header('Location: https://car-for-all-273711.appspot.com/admin');
exit();
?>
