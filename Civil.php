<?php
require_once("Person.php");
require_once("Booklet.php");

class Civil extends Person{
    private $booklet;

    public function __construct(){
        $this->booklet = new Booklet($this);
    }

    public function getBooklet(){
        return $this->booklet;
    }
}