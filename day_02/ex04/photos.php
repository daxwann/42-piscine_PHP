#!/usr/bin/php
<?php
if ($argc != 2)
	exit();
$curl = curl_init();
if (!http_response($argv[1]))
{
	curl_close($curl);
	exit();
}
else
	$url = $argv[1];
$dir = preg_match("/(?<=:\/\/).*$/", $url);
echo $dir."\n";
?>
