#!/usr/bin/php
<?php
$arr = Array();
function ft_split($str)
{
	$arr = explode(" ", $str);
	$words = array_values(array_filter($arr));
	return ($words);
}

if ($argc == 1)
	exit() ;
for ($i = 1; $i < $argc; $i++)
{
	if (is_string($argv[$i]))
	{
		$words = ft_split($argv[$i]);
		foreach($words as $word)
			array_push($arr, $word);
	}
	else
		array_push($arr, $argv[$i]);
}
sort($arr);
foreach($arr as $ele)
	echo "$ele\n";
?>
