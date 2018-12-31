<?php
	$login = "zaz";
	$password = "jaimelespetitsponeys";
	if ($_SERVER['PHP_AUTH_USER'] === $login && $_SERVER['PHP_AUTH_PW'] === $password)
	{
?>
<html><body>
Hello Zaz<br />
<img src='data:image/png;base64, <?php
	$file = file_get_contents('../img/42.png');
	echo base64_encode($file);?>'>
</body></html>
<?php
	}
	else
	{
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm=\'\'Member area\'\'");
?>
<html><body>That area is accessible for members only</body></html>
<?php
	}
?>
