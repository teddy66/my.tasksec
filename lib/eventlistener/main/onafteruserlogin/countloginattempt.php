<?php

namespace My\TaskSec\EventListener\Main\OnAfterUserLogin;

use Rzn\Librabry\Registry;
use Bitrix\Main\Type;

class CountLoginAttempt
{

    /**
     * @param $e \Rzn\Library\EventManager\Event
     */
    public function __invoke($e)
    {
       /*
        Извлечение параметров, которые передал битрикс
        Это объект, поэтому значения, которые будут в нем изменены передадутся наружу
       */
       /** @var \ArrayAccess  $params */
        $params = $e->getParams();
		
        //параметр только один
        $arFields = $params[0];
		
        // USER_ID - в случае если авторизация прошла успешно содержит код пользователя
        if (!isset($arFields['USER_ID']) or !$arFields['USER_ID']) {
            $id = $params[0];
            $data = \CUser::GetByLogin($arFields['LOGIN'])
            if (!$data) {
				// нет такого пользователя
                //return;
				$my_desc = GetMessage("MY_TASKSEC_NO_USER");
            }
			else {
			  //  неверный пароль
			  $my_desc = GetMessage("MY_TASKSEC_WRONG_PWORD");
			}
            //$arFields['USER_ID'] = $data['USER_ID'];
        }
		else {
			// успешный вход
			$my_desc = GetMessage("MY_TASKSEC_SUCCESS");
		}	
        
		/** @var MyService $myobject */
		$myobject = Registry:: getServiceMenager()->get('MySuperService');
		$myobject->countUse();
		//global $DB;
        //$this->count++;
		
		//$arStat = \My\Tasksec\DbTable::add(array(
		//	'login' => 'User2',
		//	'pword' => 'Password2',
		//	'logindate' => new Type\DateTime,
		//	'desc' => $my_desc
		//));
        // Параметр будет изменен
		//$arFields['RESULT_MESSAGE'] = array("TYPE" => "ERROR", "MESSAGE" => "Ваш бюджет блокирован.");
        //$params[0] = $arFields;
    }

}