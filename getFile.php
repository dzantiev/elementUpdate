<?php
/**
 * Выдает содержимое файла системы
 * принимает путь файлы  $_REQUEST['path'] 
 */
if(!empty($_REQUEST['path']))
{
	$path = $_SERVER['DOCUMENT_ROOT']."/system/{$_REQUEST['path']}";
	if(!empty($_REQUEST['type']) && $_REQUEST['type'] == 'run')
	{
		$path = $_SERVER['DOCUMENT_ROOT'].$_REQUEST['path'];
		if(is_file($path))
			echo file_get_contents($path);
	}
	else if(is_file($path))
		echo file_get_contents($path);
	else
		echo "empty";
}