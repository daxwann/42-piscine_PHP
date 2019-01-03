<?php
function get_new_msg()
{
  $new_msg['time'] = time();
  $new_msg['login'] = $_SESSION['loggued_on_user'];
  $new_msg['msg'] = $_POST['msg'];
  return ($new_msg);
}

function get_log($file)
{
  $serial = file_get_contents($file);
  $log = unserialize($serial);
  return ($log);
}

function write_file($log, $file)
{
  $fd = fopen($file, "w");
  if (flock($fd, LOCK_EX))
  {
    file_put_content($file, serialize($log));
    flock($fd, LOCK_UN);
  }
  fclose($fd);
}

session_start();

if (!$_SESSION['loggued_on_user'])
  throw_error();
$chat_file = "../private/chat";
if (file_exists($chat_file))
  $log = get_log($chat_file);
else
  file_put_contents($chat_file, null);
$new_message = get_new_msg();
$log[] = $new_message;
write_file($log, $chat_file);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>speak</title>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
  </head>
  <body>
    <form action="speak.php" method="post">
      <input type="text" name="msg" value=""/>
      <input type="submit" name="submit" value="Send"/>
    </form>
  </body>
</html>
