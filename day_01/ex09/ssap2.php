#!/usr/bin/php
<?php

$arr_str = Array();
$arr_num = Array();
$arr_other = Array();
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
		{
			if (ctype_alpha($word))
				array_push($arr_str, $word);
			else if (is_numeric($word))
				array_push($arr_num, $word);
			else
				array_push($arr_other, $word);
		}
	}
	else
	{
		if (ctype_alpha($argv[$i]))
			array_push($arr_str, $argv[$i]);
		else if (is_numeric($argv[$i]))
			array_push($arr_num, $argv[$i]);
		else
			array_push($arr_other, $argv[$i]);
	}
}
sort($arr_str, SORT_STRING | SORT_FLAG_CASE);
sort($arr_num, SORT_STRING);
sort($arr_other);
foreach($arr_str as $ele)
	echo "$ele\n";
foreach($arr_num as $ele)
	echo "$ele\n";
foreach($arr_other as $ele)
	echo "$ele\n";

?>
