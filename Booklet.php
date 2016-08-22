<?php
require_once("Account.php");

class Booklet extends Account{

    public function __construct(Civil $c){
        parent::__construct($c);
    }

}