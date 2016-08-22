<?php
require_once("Current.php");

abstract class Person{
    private $currentAccounts = [];

    public function getAccounts(){
        return $this->currentAccounts;
    }

    public function addAccount(Current $c){
        $this->currentAccounts[] = $c;
    }
}