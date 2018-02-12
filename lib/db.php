<?php
namespace My\TaskSec;

use Bitrix\Main\Entity;
use	Bitrix\Main\Localization\Loc;
	
Loc::loadMessages(__FILE__);

/**
 * Class DbTable
 * 
 * Fields:
 * <ul>
 * <li> id int mandatory
 * <li> name string(255) mandatory
 * <li> desc string(255) mandatory
 * <li> link string(255) mandatory
 * </ul>
 *
 * @package Bitrix\Info
 **/

class DbTable extends Entity\DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'my_login_attempt_db';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return array(
			'id' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
				'title' => Loc::getMessage('DB_ENTITY_ID_FIELD'),
			),
			'login' => array(
				'data_type' => 'string',
				'required' => true,
				'title' => Loc::getMessage('DB_ENTITY_LOGIN_FIELD'),
			),
			'pword' => array(
				'data_type' => 'string',
				'required' => true,
				'title' => Loc::getMessage('DB_ENTITY_PWORD_FIELD'),
			),
			'logindate' => array(
				'data_type' => 'datetime',
				'required' => true,
				'title' => Loc::getMessage('DB_ENTITY_LOGINDATE_FIELD'),
			),
			'desc' => array(
				'data_type' => 'string',
				'title' => Loc::getMessage('DB_ENTITY_DESC_FIELD'),
			),
		);
	}
}
