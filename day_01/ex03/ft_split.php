#!/usr/bin/php
<?php

function ft_split($str)
{
	$arr = explode(" ", $str);
	$words = array_values(array_filter($arr));
	sort($words);
	return ($words);
}

?>
