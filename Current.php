<?php
require_once("Account.php");

class Current extends Account{

    private static $nbCurrent = 1;
    const PREFIX = "CA";

    public static function getNbCurrent(){
        return self::$nbCurrent;
    }

    public function __construct(Person $p){
        parent::__construct($p);
        $p->addAccount($this);
        $this->setNumber(self::PREFIX . self::$nbCurrent);
        self::$nbCurrent++;
    }
    

}