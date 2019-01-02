<?php
  include "auth.php";
  function throw_error()
  {
    echo "ERROR\n";
    exit();
  }
  if (!$_GET['login'] || !$_GET['passwd'] || !$_GET['submit'])
    throw_error();
  if ($_GET['submit'] !== "OK")
    throw_error();
  $login = $_GET['login'];
  $passwd = $_GET['passwd'];
  session_start();
  if (auth($login, $passwd) === FALSE)
  {
    $_SESSION['loggued_on_user'] = "";
    throw_error();
  }
  else
  {
    $_SESSION['loggued_on_user'] = $login;
    echo "OK\n";
  }
