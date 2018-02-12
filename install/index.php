<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Application;
use Bitrix\Main\IO\Directory;

Loc::loadMessages(__FILE__);

class my_tasksec extends CModule{
	
	public function __construct(){

	if(file_exists(__DIR__."/version.php")){

		$arModuleVersion = array();

		include_once(__DIR__."/version.php");

		$this->MODULE_ID 		   = str_replace("_", ".", get_class($this));
		$this->MODULE_VERSION 	   = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		$this->MODULE_NAME 		   = Loc::getMessage("MY_TASKSEC_NAME");
		$this->MODULE_DESCRIPTION  = Loc::getMessage("MY_TASKSEC_DESCRIPTION");
		$this->PARTNER_NAME 	   = Loc::getMessage("MY_TASKSEC_PARTNER_NAME");
		$this->PARTNER_URI  	   = Loc::getMessage("MY_TASKSEC_PARTNER_URI");
	}

	return false;
}

public function DoInstall(){

	global $APPLICATION;

	if(CheckVersion(ModuleManager::getVersion("main"), "14.00.00")){

		$this->InstallFiles();
		$this->InstallDB();

		ModuleManager::registerModule($this->MODULE_ID);

	}else{

		$APPLICATION->ThrowException(
			Loc::getMessage("MY_TASKSEC_INSTALL_ERROR_VERSION")
		);
	}

	$APPLICATION->IncludeAdminFile(
		Loc::getMessage("MY_TASKSEC_INSTALL_TITLE")." \"".Loc::getMessage("MY_TASKSEC_NAME")."\"",
		__DIR__."/step.php"
	);

	return false;
}

public function InstallFiles(){

	return false;
}

public function InstallDB(){

	return false;
}


public function DoUninstall(){

	global $APPLICATION;

	$this->UnInstallFiles();
	$this->UnInstallDB();

	ModuleManager::unRegisterModule($this->MODULE_ID);

	$APPLICATION->IncludeAdminFile(
		Loc::getMessage("MY_TASKSEC_UNINSTALL_TITLE")." \"".Loc::getMessage("MY_TASKSEC_NAME")."\"",
		__DIR__."/unstep.php"
	);

	return false;
}

public function UnInstallFiles(){


	return false;
}

public function UnInstallDB(){

	Option::delete($this->MODULE_ID);

	return false;
}
	
	
	
}

