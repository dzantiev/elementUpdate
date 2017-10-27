<?php
/**
 * Принимает верскию с которой надо обновиться до последней
 * Расчитвает файлы которые надо обновить, и выдает их в JSON формате
 * Файлы скачиваются пооддельности
 * *
 * Все файлы изменения прописыватся относительно корня системы, без начального слеша
 * прим. app/views/index/index.volt
 */

if(!empty($_REQUEST['version']))
{
	// определение последней версии
	// проход от текущей версии до последней
	// собирая файлы котоые нужно обновить
	$versions   = json_decode(file_get_contents('var/versions.json'));
	$diff       = [];
	$curVersion = $_REQUEST['version'];
	$beginDiff  = false;
	foreach($versions as $version)
	{
		if($beginDiff)
			$diff[] = $version;
		if($curVersion == $version)
			$beginDiff = true;
	}

	if(count($diff))
	{
		$updateFiles = [];
		foreach ($diff as $vers)
		{
			$curJson = file_get_contents('var/diff/v'.$vers.'.json');
			if(!empty($curJson))
			{
				$curJson     = json_decode($curJson,true);
				$updateFiles = array_merge($updateFiles,$curJson);
			}
		}
		if(count($updateFiles))
		{
			// в конце добавляется информация о версии
			$updateFiles[] = ['type'=>'version','value'=>end($versions)];
			echo  json_encode(['result'=>'success','files'=>$updateFiles]);
		}
	}
	else
		echo json_encode(['result'=>'error','msg'=>'something wrong']);
}
else
	echo json_encode(['result'=>'error','msg'=>'empty version']);

?>