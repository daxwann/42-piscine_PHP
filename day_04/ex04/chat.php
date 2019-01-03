<?php
  date_default_timezone_set();

  function get_log($file)
  {
    $serial = file_get_contents($file);
    $log = unserialize($serial);
    return ($log);
  }

  function throw_error()
  {
    header("Location: index.html");
    echo "ERROR\n";
    exit();
  }

  session_start();

  if (!$_SESSION['loggued_on_user'])
    throw_error();
  $chat_file = "../private/chat";
  $log = get_log($chat_file);
  foreach($log as $i => $msg)
  {
    echo "[".date(H:i, $msg['time'])."] " ;
    echo "<b>".$msg['login']."</b>: ";
    echo $msg['msg']."<br />";
  }
