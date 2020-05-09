<?php
session_start();
ob_start();
?>

<html>
<head>
<title>login check</title>
</head>
<body>

<h1>Login Check</h1>
<p>
HELLO THIS IS LOGIN CHECKER. Recieved: <?php echo $username ?> and <?php echo $password ?>
</p>
</body>
</html>