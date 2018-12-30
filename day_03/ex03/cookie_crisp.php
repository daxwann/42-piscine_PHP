<?php

function set_cookie($name, $val)
{
	if ($name && $val)
		setcookie($name, $val);
}

function get_cookie($name, $val)
{
	if ($name && $_COOKIE[$name] && !$val)
		echo $_COOKIE[$name]."\n";
}

function del_cookie($name, $val)
{
	if ($name && !$val)
		setcookie($name, false, 1);
}

if ($_GET['action'] == "set")
	set_cookie($_GET['name'], $_GET['value']);
else if ($_GET['action'] == "get")
	get_cookie($_GET['name'], $_GET['value']);
else if ($_GET['action'] == "del")
	del_cookie($_GET['name'], $_GET['value']);
