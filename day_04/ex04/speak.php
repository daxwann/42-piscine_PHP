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
  $fd = fopen($file, "r");
  flock($fd, LOCK_SH);
  $serial = file_get_contents($file);
  flock($fd, LOCK_UN);
  fclose($fd);
  $log = unserialize($serial);
  return ($log);
}

function write_file($file, $log)
{
  $fd = fopen($file, "w");
  flock($fd, LOCK_EX);
  file_put_contents($file, serialize($log));
  flock($fd, LOCK_UN);
  fclose($fd);
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
if (file_exists($chat_file))
  $log = get_log($chat_file);
else
  file_put_contents($chat_file, null);
if ($_POST['msg'])
{
  $new_message = get_new_msg();
  $log[] = $new_message;
  write_file($chat_file, $log);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>speak</title>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
    <style media="screen">
      form {
        width: 100%;
      }
      form input {
      }
      .textbox {
        display: block;
        width: 100%;
      }
      .btn-submit {
        width: 10em;
        background-color: lightblue;
      }
    </style>
  </head>
  <body>
    <form action="speak.php" autocomplete="off" method="post">
      <input class="textbox" type="text" name="msg" value=""/>
      <input class="btn" type="submit" name="submit" value="Send"/>
    </form>
  </body>
</html>
