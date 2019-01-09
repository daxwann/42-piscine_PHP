#!/usr/bin/php
<?php

date_default_timezone_set('America/Los_Angeles');
$file = fopen("/var/run/utmpx", "r");
while ($utmpx = fread($file, 628))
{
	$unpack = unpack("a256user/a4id/a32term/ipid/ilogin/I2time/a256host/i16future", $utmpx);
	$tty[$unpack['term']] = $unpack;
}
ksort($tty);
foreach ($tty as $v){
	if ($v['login'] == 7) {
		echo str_pad(substr(trim($v['user']), 0, 8), 8, " ")." ";
		echo str_pad(substr(trim($v['term']), 0, 8), 8, " ")." ";
		echo date("M", $v["time1"]);
		echo str_pad(date("j", $v["time1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $v["time1"]);
		echo "\n";
        }
}

?>
