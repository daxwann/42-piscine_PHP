#!/usr/bin/php
<?php

if ($argc != 2)
	return ;
$arr = explode(" ", $argv[1]);
$words = array_values(array_filter($arr));
$str = join(" ", $words);
echo "$str\n";

?>
