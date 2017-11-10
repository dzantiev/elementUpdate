<?php
/**
 * Принимает запрос на проверку обновлений
 * Сравнивает с последней вресией, если это не последняя вресия то сообщает об этом
 * Все общение происходит по JSON
 */
if(!empty($_REQUEST['version']))
{
	$versions    = json_decode(file_get_contents('var/versions.json'));
	$reqVersion  = explode('.', $_REQUEST['version']);
	$lastVersion = explode('.',end($versions));
	$hasUpdates  = false;
	foreach ($reqVersion as $key => $v)
	{
		if($lastVersion[$key] > $v)
		{
			$hasUpdates = true;
			break;
		}
	}
	if($hasUpdates)
		echo json_encode(array('result'=>'success','hasUpdates'=>true,'msg'=>'Имеются обновления - '.end($versions)));
	else
		echo json_encode(array('result'=>'success','hasUpdates'=>false,'msg'=>'У вас последняя версия системы'));
}
else
	echo json_encode(array('result'=>'error','msg'=>'empty version'));
