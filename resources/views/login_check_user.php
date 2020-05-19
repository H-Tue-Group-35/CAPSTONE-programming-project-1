<?php
session_start();
ob_start();
?>

<script>
sessionStorage.loginid = "<?php echo $username ?>";

console.log("SESSION: "+sessionStorage.loginid);
window.location.replace("https://car-for-all-273711.appspot.com/");
</script>