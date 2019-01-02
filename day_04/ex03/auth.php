<?php
  function auth($login, $passwd)
  {
    $PASSWD_FILE = "../private/passwd";
    $serial = file_get_contents($PASSWD_FILE);
    $accounts = unserialize($serial);
    foreach ($accounts as $index => $account)
    {
      if ($account['login'] === $login)
      {
        $encrypted_pw = hash("whirlpool", $passwd);
        if ($account['passwd'] === $encrypted_pw)
          return (TRUE);
        else
          return (FALSE);
      }
    }
    return (FALSE);
  }
  ?>
