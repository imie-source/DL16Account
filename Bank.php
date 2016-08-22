<?php

require_once("Account.php");

class Bank{
    private $accounts = [];
    private static $instance;
    private $name;

    private function __construct($name){
        $this->name = $name;
    }

    public static function euroToFranc($value){
        return "$value € ( " . $value * 6.56 . " Francs )";
    }

    public static function getTheBank(){
        if(!isset(self::$instance)){ // check if Bank instance exists
            self::$instance = new Bank("BNP Paribas");
        }
        return self::$instance;
    }

    public function getName(){
        return $this->name;
    }

    public function addAccount(Account $account){
        $this->accounts[] = $account;
    }

    // public function removeAccount(){
    //     
    // }

    public function getAccounts(){
        return $this->accounts();
    }
}