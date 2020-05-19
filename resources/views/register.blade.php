<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h1>User register</h1>

	<p>Please enter your details to create an account</p>
	
	<form action="register_check" method="post">
	Username: <input type="text" name="username" id="username" maxlength="20" required>
	<br/><br/>
	<!--Password: <input type="password" name="password" id="password">-->
	Password: <input type="text" name="password" id="password" maxlength="20" required>
	<br/><br/>
	<button type="submit">Register</button>
	</form>
	
	Already have an account? <a href="login">Login</a>
	<a href="/">Back to home</a>

</body>
</html>