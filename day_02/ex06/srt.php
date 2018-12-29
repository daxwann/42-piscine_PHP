#!/usr/bin/php
<?php

function is_time($value)
{
	return preg_match("/^\d\d:\d\d:\d\d,\d\d\d\s-->\s\d\d:\d\d:\d\d,\d\d\d$/", $value);
}

if ($argc != 2 || !file_exists($argv[1]))
	exit();
$fd = fopen($argv[1], "r");
while ($fd && !feof($fd))
	$lines[] = fgets($fd);
foreach($lines as $index => $line)
{
	if (is_time($line))
	{
		if (isset($lines[$index + 1]))
			$content_at[$line] = $lines[$index + 1];
		else
			exit();
	}
}
ksort($content_at);
$index = 1;
$total = count($content_at);
foreach($content_at as $time => $content)
{
	echo "$index\n";
	echo "$time";
	echo "$content";
	if ($index < $total)
		echo "\n";
	$index++;
}
?>
