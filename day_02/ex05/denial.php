#!/usr/bin/php
<?php
	if ($argc != 3)
		exit();

	function read_lines($file)
	{
		if (!file_exists($file))
			exit();
		$fd = fopen($file, 'r');
		if ($fd < 0)
			exit();
		while (!feof($fd))
		{
			$line = fgets($fd);
			if (trim($line) != '')
				$lines[] = $line;
		}
		return ($lines);
	}

	function get_header($lines)
	{
		$header = array_shift($lines);
		$header = array_map("trim", $header);
		return ($header);
	}

	
	$index = array_search($argv[2], $header);
	if ($index === false)
		exit();
	foreach ($header as $header_i => $header_v)
	{

	}	
?>
