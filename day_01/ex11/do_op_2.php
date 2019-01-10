#!/usr/bin/php
<?php

if ($argc != 2)
{
	echo "Incorrect Parameters\n";
	exit();
}

function pick_ops($str)
{
	preg_match('/^\s*(\S+)\s*([\+|\-|\/|\*|\%])\s*(\S+)\s*$/', $str, $matches);
	return ($matches);
}

function display_error()
{
	echo "Syntax Error\n";
	exit();
}

$ops = pick_ops($argv[1]);
if (!$ops || in_array("", $ops))
	display_error();
if (!is_numeric($ops[1]) || !is_numeric($ops[3]))
	display_error();
switch ($ops[2])
{
case "+":
	echo ($ops[1] + $ops[3])."\n";
	break;
case "-":
	echo ($ops[1] - $ops[3])."\n";
	break;
case "*":
	echo ($ops[1] * $ops[3])."\n";
	break;
case "/":
	echo ($ops[1] / $ops[3])."\n";
	break;
case "%":
	echo ($ops[1] % $ops[3])."\n";
	break;
default:
	display_error();
}

?>
