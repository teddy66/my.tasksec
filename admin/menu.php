<?
global $APPLICATION;

include(__DIR__ .'/../loader.php');
include(__DIR__ .'/../locale/ru.php');

if ($APPLICATION->GetGroupRight("My.TaskSec") == "D") {
    return false;
}

$aMenu = array(
    "parent_menu" => "global_menu_content",
    "section" => "My",
    "sort" => 50,
    "text" => GetMessage('MY_TASKFIRST_MENU_MY'),
    "icon" => "sys_menu_icon",
    "page_icon" => "sys_page_icon",
    "items_id" => "my_tasksec",
    "items" => array(
        array(
            "text" => GetMessage('MY_TASKFIRST_MENU_TASKFIRST'),
            "url" => "/local/modules/my.tasksec/admin/my_tasksec.php?lang=" . LANGUAGE_ID,
        ),

    )
);

return $aMenu;