<?php
namespace My\TaskSec;

use Rzn\Library\ServiceManager\ServiceLocatorAwareInterface;
use Rzn\Library\ServiceManager\ServiceLocatorInterface;
use Bitrix\Main\Type;

class MyService implements ServiceLocatorAwareInterface
{
    protected $sm;
    
    //protected $count = 0;
    
    /**
    * Собственный рабочий метод сервиса
    */
    public function countUse($login, $password, $my_desc)
    {
		//global $DB;
        //$this->count++;
		$arStat = \My\Tasksec\DbTable::add(array(
			'login' => $login,
			'pword' => $password,
			'logindate' => new Type\DateTime,
			'desc' => $my_desc
		));

    }
    
    public function getCount()
    {
        //return $this->$arStat;
    }
    
    /**
    * Извлечение сервиса сессии для использовании внутри объекта класса.
    * @return \Rzn\Library\Session
    */
    protected function getSession()
    {
        $this->getServiceLocator()->get('session');
    }
    
    /**
     * Внедрение сервис локатора
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->sm = $serviceLocator;
    }

    /**
     * Возврат сервис локатора.
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->sm;
    }
}