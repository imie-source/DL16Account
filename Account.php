<?php
require_once("Bank.php");
require_once("Person.php");

abstract class Account{
    private $bank;
    private $owner;
    private $number;

    public function __construct(Person $p){
        $this->setBank(Bank::getTheBank());
        $this->setOwner($p);
    }

    public function getNumber(){
        return $this->number;
    }

    public function setNumber($number){
        $this->number = $number;
    }

    public function getOwner(){
        return $this->owner;
    }

    public function setOwner(Person $p){
        $this->owner = $p;
    }

    public function getBank(){
        return $this->bank;
    }

    public function setBank(Bank $bank){
        $this->bank = $bank;
        $bank->addAccount($this);
    }
}