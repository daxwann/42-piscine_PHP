#!/usr/bin/php
<?php

function ft_is_sort($arr)
{
	$sorted = $arr;
	sort($sorted);
	return($arr === $sorted);
}

?>
