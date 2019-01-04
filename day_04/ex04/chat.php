<?php
  date_default_timezone_set("America/Los_Angeles");

  function get_log($file)
  {
    $fd = fopen($file, "r");
    flock($fd, LOCK_SH);
    $serial = file_get_contents($file);
    flock($fd, LOCK_UN);
    fclose($fd);
    $log = unserialize($serial);
    return ($log);
  }

  function throw_error()
  {
    echo "ERROR\n";
    exit();
  }

  session_start();

  if (!$_SESSION['loggued_on_user'])
    throw_error();
  $chat_file = "../private/chat";
  if (!file_exists($chat_file))
    throw_error();
  $log = get_log($chat_file);
  foreach ($log as $i => $msg)
  {
    echo "[".date("H:i", $msg["time"])."] ";
    echo "<b>".$msg["login"]."</b>: ";
    echo $msg["msg"]."<br />";
  }
