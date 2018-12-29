#!/usr/bin/php
<?php
	if ($argc != 3)
		exit();

	function create_table($file)
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
				$table[] = explode(";", $line);
		}
		return ($table);
	}

	function get_header(&$table)
	{
		$header = array_shift($table);
		$header = array_map("trim", $header);
		return ($header);
	}

	function get_search_index($query, $header)
	{
		$index = array_search($query, $header);
		if ($index === false)
			exit();
		return ($index);
	}

	function get_hash($header_col, $search_col, $table)
	{
		$hash = array();
		foreach($table as $row)
		{
			if (isset($row[$search_col]))
				$hash[trim($row[$search_col])] = trim($row[$header_col]);
		}
		return ($hash);
	}

	$table = create_table($argv[1]);
	$header = get_header($table);
	$search_col = get_search_index($argv[2], $header);
	foreach ($header as $header_col => $header_val)
		$$header_val = get_hash($header_col, $search_col, $table);
	$stdin = fopen("php://stdin", "r");
	while ($stdin && !feof($stdin))
	{
		echo "Enter your command: ";
		$command = fgets($stdin);
		if ($command)
			eval($command);
	}
	fclose($stdin);
	echo "\n";
?>
