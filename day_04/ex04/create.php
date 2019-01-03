<?php
  $PRIVATE_FOLDER = "../private";
  $PASSWD_FILE = "../private/passwd";
  function throw_error()
  {
    header('Location: create.html');
    echo "ERROR\n";
    exit();
  }

  function make_private_folder($folder)
  {
    if (!file_exists($folder))
      mkdir($folder);
  }

  function passwd_file_exist($file)
  {
    if (file_exists($file))
      return (true);
    else
      return (false);
  }

  function open_passwd_file($file)
  {
    $serial = file_get_contents($file);
    $accounts = unserialize($serial);
    return ($accounts);
  }

  function create_user($login, $passwd)
  {
    $new_user['login'] = $login;
    $new_user['passwd'] = hash("whirlpool", $passwd);
    return ($new_user);
  }

  if (!$_POST['login'] || !$_POST['passwd'] ||
  !$_POST['submit'])
    throw_error();
  if ($_POST['submit'] != "OK")
    throw_error();
  make_private_folder($PRIVATE_FOLDER);
  if (passwd_file_exist($PASSWD_FILE))
  {
    $accounts = open_passwd_file($PASSWD_FILE);
    foreach ($accounts as $index => $account)
    {
      if ($account['login'] === $_POST['login'])
        throw_error();
    }
  }
  $new_user = create_user($_POST['login'], $_POST['passwd']);
  $accounts[] = $new_user;
  file_put_contents($PASSWD_FILE, serialize($accounts));
  header('Location: index.html');
  echo "OK\n";
