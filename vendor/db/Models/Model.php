<?php
namespace vendor\Model;

class Sales{
    //Поля класса
    public $id=0;
    public $NameClient=NULL;
    public $Period=NULL;
    public $Sum=NULL;

    //Пустой конструктор
    public function __construct(){

    }
    
// Пользовательские конструкторы
    public function sConstruct($aId,$aNameClient,$aPeriod,$aSum){//Создание класса с полными данными
        $this->id = $aId;
        $this->NameClient = $aNameClient;
        $this->Period = new \DateTime($aPeriod);
        $this->Sum = $aSum;
    }
    public function sСonstructDate($aId,$aPeriod,$aSum){//Создание Класса с OrderBy параметром, выборка по периоду
        $this->id = $aId;
        $this->Period = new \DateTime($aPeriod);
        $this->Sum = $aSum;
    }
}
?>