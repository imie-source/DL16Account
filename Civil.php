<?php
require_once("Person.php");
require_once("Booklet.php");

class Civil extends Person{
    private $booklet;

    public function __construct($name, $balance = 0, $maxDebit = 1000){
        parent::__construct($name);
        $this->booklet = new Booklet($this, $balance, $maxDebit);
    }

    public function getBooklet(){
        return $this->booklet;
    }
}