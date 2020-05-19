<?php
session_start();
ob_start();
?>

<script>
sessionStorage.loginid = "<?php echo $username ?>";

console.log("SESSION: "+sessionStorage.loginid);
</script>

<?php
	if (strcmp($username,"admin") === 0 && strcmp($password,"admin") === 0)
	{
		// password is correct, redirect to cp
		//header('Location: https://car-for-all-273711.appspot.com/');
		exit();
	}

//header('Location: https://car-for-all-273711.appspot.com/');
exit();
?>