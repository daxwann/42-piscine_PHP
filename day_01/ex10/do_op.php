#!/usr/bin/php
<?php

if ($argc != 4)
{
	echo "Incorrect Parameters\n";
	exit();
}
$num1 = trim($argv[1]);
$op = trim($argv[2]);
$num2 = trim($argv[3]);

switch ($op)
{
case "+":
	echo ($num1 + $num2)."\n";
	break;
case "-":
	echo ($num1 - $num2)."\n";
	break;
case "*":
	echo ($num1 * $num2)."\n";
	break;
case "/":
	echo ($num1 / $num2)."\n";
	break;
case "%":
	echo ($num1 % $num2)."\n";
	break;
default:
	exit();
}
?>
