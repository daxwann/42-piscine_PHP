#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
if ($argc != 2)
	exit();
function display_error()
{
	echo "Wrong Format\n";
	exit();
}
$format = explode(" ", $argv[1]);
if (count($format) != 5)
	display_error();
if (!preg_match('/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)$/', $format[0]))
	display_error();
if (!preg_match('/^([1-9]|1[0-9]|2[0-9]|3[0-1])$/', $format[1]))
	display_error();
switch ($format[2])
{
	case (preg_match('/^[Jj]anvier$/', $format[2]) ? true : false):
		$m = "1";
		break;
	case (preg_match('/^[Ff]evrier$/', $format[2]) ? true : false):
		$m = "2";
		break;
	case (preg_match('/^[Mm]ars$/', $format[2]) ? true : false):
		$m = "3";
		break;
	case (preg_match('/^[Aa]vril$/', $format[2]) ? true : false):
		$m = "4";
		break;
	case (preg_match('/^[Mm]ai$/', $format[2]) ? true : false):
		$m = "5";
		break;
	case (preg_match('/^[Jj]uin$/', $format[2]) ? true : false):
		$m = "6";
		break;
	case (preg_match('/^[Jj]uillet$/', $format[2]) ? true : false):
		$m = "7";
		break;
	case (preg_match('/^[Aa]out$/', $format[2]) ? true : false):
		$m = "8";
		break;
	case (preg_match('/^[Ss]eptembre$/', $format[2]) ? true : false):
		$m = "9";
		break;
	case (preg_match('/^[Oo]ctobre$/', $format[2]) ? true : false):
		$m = "10";
		break;
	case (preg_match('/^[Nn]ovembre$/', $format[2]) ? true : false):
		$m = "11";
		break;
	case (preg_match('/^[Dd]ecembre$/', $format[2]) ? true : false):
		$m = "12";
		break;
	default:
		display_error();
}
if (!preg_match('/^[0-1][0-9][0-9][0-9]|200[0-9]|201[0-9]$/', $format[3]))
	display_error();
if (!preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$/', $format[4]))
	display_error();
echo strtotime("$format[1]-$m-$format[3] $format[4]")."\n";
?>
