<?php
$handle = fopen("lastUpdatesGitOut.txt", "r");
if (!$handle)
	return false;

$updateArray = [];
while (($line = fgets($handle)) !== false)
{
	$line = explode('	',$line);
	if(count($line) < 2) continue;
	$line[1] = trim($line[1]);
	$updateArray[$line[1]] = [
		'type' => getStatusName($line[0]),
		'path' => "http://element.woorkup.ru/getFile.php?path={$line[1]}"
	];
}
fclose($handle);

echo "<pre>";
print_r(json_encode($updateArray,JSON_PRETTY_PRINT));
exit();



function getStatusName($statCode)
{
	$statNames = [
		'A' => 'add',
		'M' => 'update',
		'D' => 'delete',
	];
	if(array_key_exists($statCode, $statNames))
		return $statNames[$statCode];
}
