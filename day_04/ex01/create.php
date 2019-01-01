<?php
  function throw_error()
  {
    echo "ERROR\n";
    exit();
  }

  function make_private_folder($path)
  {
    if (!file_exists($path))
      mkdir($path);
  }

  function passwd_file_exist($path)
  {
    if (file_exists($path))
      return (true);
    else
      return (false);
  }

  function open_passwd_file($path)
  {
    $file = file_get_contents($path);
    $accounts = unserialize($file);
    return ($accounts);
  }

  function create_passwd_file()
  {
    file_put_contents("../private/passwd", null);
  }

  function create_user($login, $passwd)
  {
    $new_user['login'] = $_POST['login'];
    $new_user['passwd'] = hash("whirlpool", $_POST['passwd']);
    return ($new_user);
  }

  if (!isset($_POST['login']) || !isset($_POST['passwd']) ||
  !isset($_POST['submit']))
    throw_error();
  if ($_POST['submit'] != "OK")
    throw_error();
  make_private_folder("../private");
  if (passwd_file_exist("../private/passwd"))
  {
    $accounts = open_passwd_file("../private/passwd");
    if (array_key_exist($_POST['login'], $account))
      throw_error();
  }
  else
    $accounts = array();
  $new_user = create_user($_POST['login'], $_POST['passwd']);
  $accounts[] = $new_user;
  file_put_contents("../private/passwd", serialize($accounts));
  echo "OK\n";
