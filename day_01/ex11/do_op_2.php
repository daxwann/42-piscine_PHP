#!/usr/bin/php
<?php

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

function ft_split($str)
{
	$arr = str_split($str);
	$trimmed = array_map('trim', $arr);
	$ops = array_values(array_filter($trimmed));
	return ($ops);
}

function display_error()
{
	echo "Syntax Error\n";
	exit();
}

$ops = ft_split($argv[1]);
if (count($ops) != 3)
	display_error();
if (!is_numeric($ops[0]) || !is_numeric($ops[2]))
	display_error();
switch ($ops[1])
{
case "+":
	echo ($ops[0] + $ops[2])."\n";
	break;
case "-":
	echo ($ops[0] - $ops[2])."\n";
	break;
case "*":
	echo ($ops[0] * $ops[2])."\n";
	break;
case "/":
	echo ($ops[0] / $ops[2])."\n";
	break;
case "%":
	echo ($ops[0] % $ops[2])."\n";
	break;
default:
	display_error();
}

?>
