#!/usr/bin/php
<?php

if ($argc < 3)
    exit();

$i = 2;
$hash = array();
while ($i < $argc)
{
    $arr = explode(":", $argv[$i]);
    $hash[$arr[0]] = $arr[1];
    $i++;
}
if (array_key_exists($argv[1], $hash))
	echo $hash[$argv[1]]."\n";
else
	exit();
?>
