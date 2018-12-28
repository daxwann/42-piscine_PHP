#!/usr/bin/php
<?php
if ($argc != 2)
	exit();

function get_html($url)
{
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$html = curl_exec($curl);
	return ($html);
}

function get_img_src($match)
{
	return ($match[2]);
}

function get_img_links($elements, $url)
{
	$img_links = array();
	foreach($elements as $element)
	{
		$src = preg_replace_callback("/(^.*src=\")(.*?)(\".*?$)/i", "get_img_src", $element);
		if (preg_match("/(http|www).*([\.][^\/]+)$/i", $src))
			$img_links[] = $src;
		else if (preg_match("/([\.][^\/]+)$/i", $src))
			$img_links[] = $url."".$src;
	}
	return ($img_links);
}

function get_img_elements($html)
{
	preg_match_all("/<img.*?>/i", $html, $imgs);
	return ($imgs[0]);
}

function format_url($url)
{
	if (preg_match("/\/$/", $url))
		$url = preg_replace("/\/$/", "", $url);
	return ($url);
}

function create_dir($url)
{
	$dir = preg_replace("/^.*?:\/\//", "", $url);
	if (file_exists($dir) || is_dir($dir))
		return ($dir);
	mkdir($dir);
	return ($dir);
}

function get_file_name($img)
{
	$file = preg_replace("/^.*\//i", "", $img);
	return ($file);
}

function download_imgs($links, $dir)
{
	foreach($links as $link)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $link);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
		$binary = curl_exec($curl);
		curl_close($curl);
		$file = get_file_name($link);
		$fd = fopen($dir."/".$file, 'w');
		fwrite($fd, $binary);
		fclose($fd);
	}
}

$url = format_url($argv[1]);
$html = get_html($url);
if (!empty($html))
{
	$img_elements = get_img_elements($html);
	$img_links = get_img_links($img_elements, $url);
	$dir = create_dir($url);
	download_imgs($img_links, $dir);
}
?>
