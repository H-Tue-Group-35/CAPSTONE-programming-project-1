<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--link href="/style.css" rel="stylesheet" type="text/css" -->
    <title>Login</title>
</head>
<body>
    
    <h1>User login</h1>
	<p>Please login to make bookings</p>
	
	<form action="login_check_user" method="post">
	Username: <input type="text" name="username" id="username" maxlength="20" required>
	<br/><br/>
	<!--Password: <input type="password" name="password" id="password">-->
	Password: <input type="text" name="password" id="password" maxlength="20" required>
	<br/><br/>
	<button type="submit">Login</button>
	</form>
	
	<a href="register">Register an account</a>
	<br/>
	<a href="/">Back to home</a>
	

</body>
</html>