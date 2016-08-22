<?php
require_once("Current.php");

abstract class Person{
    private $currentAccount;
    private $name;

    public function __construct($name){
        $this->setName($name);
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getAccount(){
        return $this->currentAccount;
    }

    public function setAccount(Current $c){
        $this->currentAccount = $c;
    }
}