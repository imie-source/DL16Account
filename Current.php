<?php
require_once("Account.php");

class Current extends Account{

    private static $nbCurrent = 1;
    const PREFIX = "CA";
    private $maxOverDraft;

    public static function getNbCurrent(){
        return self::$nbCurrent;
    }    

    public function __construct(Person $p, $balance = 0, $maxOverDraft = 800, $maxDebit = 1000){
        parent::__construct($p, $balance, $maxDebit);
        $p->setAccount($this);
        $this->setMaxOverDraft($maxOverDraft);
        $this->setNumber(self::PREFIX . self::$nbCurrent);
        self::$nbCurrent++;
    }

    public function getPossibleDebit(){
        return min($this->getMaxDebit(), $this->getMaxOverDraft() + $this->balance);
    }

    public function credit($amount){
        $this->setBalance($amount + $this->getBalance());
    }

    public function debit($amount){
        return $this->setBalance($this->getBalance() - $amount);
    }

    protected function setBalance($balance){
        $success = false;
        if($balance > -$this->maxOverDraft){
            $this->balance = $balance;
            $success = true;            
        }
        return $success;
    }

    public function getMaxOverDraft(){
        return $this->maxOverDraft;
    }

    public function setMaxOverDraft($maxOverDraft){
        $this->maxOverDraft = $maxOverDraft;
    }
    
    public function show(){
        parent::show();
        echo "Découvert Max : " . Bank::euroToFranc($this->maxOverDraft) . "<br/>";
    }
    

}