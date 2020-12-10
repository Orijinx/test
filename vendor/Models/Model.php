<?php
namespace Model;

class Sales{
    public $id;
    public $NameClient;
    public $Period;
    public $Sum;

    public function __construct($aId,$aNameClient,$aPeriod,$aSum){
        $this->id = $aId;
        $this->NameClient = $aNameClient;
        $this->Period = new \DateTime($aPeriod);
        $this->Sum = $aSum;
    }
}
?>