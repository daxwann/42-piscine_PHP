#!/usr/bin/php
<?php

if ($argc < 2)
	exit();
$trimmed = trim($argv[1]);
$str = preg_replace('/\s+/', ' ', $trimmed);
echo "$str\n";

?>
