<?php
require_once("Account.php");

class Booklet extends Account{

    private static $nbCurrent = 1;
    const PREFIX = "B";

    public static function getNbCurrent(){
        return self::$nbCurrent;
    }

    public function __construct(Civil $c, $balance, $maxDebit){
        parent::__construct($c, $balance, $maxDebit);
        $this->setNumber(self::PREFIX . self::$nbCurrent);
        self::$nbCurrent++;
    }

}