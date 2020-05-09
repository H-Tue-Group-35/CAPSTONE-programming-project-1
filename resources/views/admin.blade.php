<?php
session_start();
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
	
	<form action="login_check" method="POST">
	Username: <input type="text" name="username" id="username" maxlength="20" required>
	<br/><br/>
	<!--Password: <input type="password" name="password" id="password">-->
	Password: <input type="text" name="password" id="password" maxlength="20" required>
	<br/><br/>
	<input type="submit" value="Login" class="primary" name="submit" />
	</form>
	
	<a href="login_check">debug bypass login</a>
	
</body>

</html>