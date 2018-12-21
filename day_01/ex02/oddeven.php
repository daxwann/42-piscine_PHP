#!/usr/bin/php
<?php

while (true)
{
	echo "Enter a number: ";
	$input = fgets(STDIN);
	if (feof(STDIN))
	{
		echo "^D\n";
		return ;
	}
	$num = rtrim($input);
	if (!is_numeric($num))
		echo "'$num' is not a number\n";
	else if ($num % 2 == 0)
		echo "The number $num is even\n";
	else
		echo "The number $num is odd\n";
} 

?>
