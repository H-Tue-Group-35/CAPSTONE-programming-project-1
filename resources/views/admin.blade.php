<?php
session_start();
ob_start();

if (isset($_GET['submit']))
{
        header('Location: https://car-for-all-273711.appspot.com/cp');
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>

    <h1>Admin login</h1>


	
	<p>Please login to access admin panel:</p>
	
	<form action="login_check" method="get">
	Username: <input type="text" name="username" id="username" maxlength="20" required>
	<br/><br/>
	<!--Password: <input type="password" name="password" id="password">-->
	Password: <input type="text" name="password" id="password" maxlength="20" required>
	<br/><br/>
	<button type="submit">Login</button>
	<input type="submit" value="Login" class="primary" name="submit" />
	</form>
	
	<a href="login_check">debug bypass login</a>
	
</body>

</html>