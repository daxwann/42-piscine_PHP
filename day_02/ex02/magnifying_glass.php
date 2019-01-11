#!/usr/bin/php
<?php

if ($argc < 2 || !file_exists($argv[1]))
	exit();

$link_content = "/(<a.*>)(.*)(<\/a>)/si";

function replace_matches($all_matches)
{
	$new_str = $all_matches[1].strtoupper($all_matches[2]).$all_matches[3];
	return ($new_str);
}

function replace_link_content($link_matches)
{
	$title_attr = "/(title=\")([^\"]*?)(\">)/msi";
	$all_content = "/(>)(.*?)(<)/msi";

	$link_matches[0] = preg_replace_callback($title_attr, "replace_matches", $link_matches[0]);
	$link_matches[0] = preg_replace_callback($all_content, "replace_matches", $link_matches[0]);
	return ($link_matches[0]);
}

$page = file_get_contents($argv[1]);
$new_page = preg_replace_callback($link_content, "replace_link_content", $page);
echo $new_page;
?>
