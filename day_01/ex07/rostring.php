#!/usr/bin/php
<?php

if ($argc == 1)
	exit();

function ft_split($str)
{
	$arr = explode(" ", $str);
	$words = array_values(array_filter($arr));
	return ($words);
}

function rostring($str)
{
	$words = ft_split($str);
	$shifted = array_shift($words);
	array_push($words, $shifted);
	$new_str = join(" ", $words);
	return ($new_str);
}

echo rostring($argv[1])."\n";

?>
