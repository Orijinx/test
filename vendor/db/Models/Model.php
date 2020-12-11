<?php
namespace vendor\Model;

class Sales{
    public $id=0;
    public $NameClient=NULL;
    public $Period=NULL;
    public $Sum=NULL;

    public function __construct(){

    }
    

    public function sConstruct($aId,$aNameClient,$aPeriod,$aSum){
        $this->id = $aId;
        $this->NameClient = $aNameClient;
        $this->Period = new \DateTime($aPeriod);
        $this->Sum = $aSum;
    }
    public function sСonstructDate($aId,$aPeriod,$aSum){
        $this->id = $aId;
        $this->Period = new \DateTime($aPeriod);
        $this->Sum = $aSum;
    }
}
?>