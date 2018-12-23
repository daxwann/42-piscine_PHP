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
if (!preg_match('/^(Lundi|Mardi|Mecredi|Jeudi|Vendredi|Samedi|Dimanche)$/', $format[0]))
	display_error();
if (!preg_match('/^([1-9]|1[0-9]|2[0-9]|3[0-1])$/', $format[1]))
	display_error();
switch ($format[2])
{
	case "Janvier":
		$m = "1";
		break;
	case "Fevrier":
		$m = "2";
		break;
	case "Mars":
		$m = "3";
		break;
	case "Avril":
		$m = "4";
		break;
	case "Mai":
		$m = "5";
		break;
	case "Juin":
		$m = "6";
		break;
	case "Juillet":
		$m = "7";
		break;
	case "Aout":
		$m = "8";
		break;
	case "Septembre":
		$m = "9";
		break;
	case "Octobre":
		$m = "10";
		break;
	case "Novembre":
		$m = "11";
		break;
	case "Decembre":
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
