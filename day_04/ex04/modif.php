<?php
  $PRIVATE_FOLDER = "../private";
  $PASSWD_FILE = "../private/passwd";
  function throw_error()
  {
    echo "ERROR\n";
    exit();
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

  function check_oldpw($passwd, $oldpw)
  {
    $encrypt = hash("whirlpool", $oldpw);
    if ($passwd !== $encrypt)
      throw_error();
  }

  if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] ||
  !$_POST['submit'])
    throw_error();
  if ($_POST['submit'] != "OK")
    throw_error();
  if (!passwd_file_exist($PASSWD_FILE))
    throw_error();
  $accounts = open_passwd_file($PASSWD_FILE);
  foreach ($accounts as $index => $account)
  {
    if ($account['login'] === $_POST['login'])
    {
      check_oldpw($account['passwd'], $_POST['oldpw']);
      $encrypt = hash("whirlpool", $_POST['newpw']);
      $accounts[$index]['passwd'] = $encrypt;
      file_put_contents($PASSWD_FILE, serialize($accounts));
      echo "OK\n";
      exit();
    }
  }
  echo "ERROR\n";
