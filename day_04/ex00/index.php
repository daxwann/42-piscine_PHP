<?php
session_start();
if ($_GET['login'] && $_GET['passwd'] && $_GET['submit'] && $_GET['submit'] === "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form action="index.php" method="GET">
	Username: <input name="login" value="<?php 
	if (isset($_SESSION['login']))
	echo $_SESSION['login'];?>" />
	<br />
	Password: <input name="passwd" value="<?php
	if (isset($_SESSION['passwd']))
	echo $_SESSION['passwd'];?>" />
   <input type="submit" value="OK" />
</form>
</body></html>
