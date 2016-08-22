<?php
require_once("Bank.php");
require_once("Person.php");

abstract class Account{
    private $bank;
    private $owner;
    private $number;
    protected $balance = 0;
    private $maxDebit;

    public function __construct(Person $p, $balance, $maxDebit){
        $this->setBank(Bank::getTheBank());
        $this->setOwner($p);
        $this->setBalance($balance);
        $this->setMaxDebit($maxDebit);
    }

    public function transfer(Account $a, $amount){
        if($this->debit($amount)){
            $a->credit($amount);
        }
    }

    public function show(){
        echo "<hr/>";
        echo "Nom du compte : $this->number <br/>";
        echo "Nom du propriétaire : " . $this->owner->getName() . "<br/>";
        echo "Solde : $this->balance €<br/>";
        echo "Montant du débit maximal autorisé : " . $this->getMaxDebit() . " €<br/>";
        echo "Débit autorisé : " . $this->getPossibleDebit() . " €<br/>";
    }

    public function getPossibleDebit(){
        return min($this->maxDebit, $this->balance);
    }

    public function setMaxDebit($maxDebit){
        $this->maxDebit = $maxDebit;
    }

    public function getMaxDebit(){
        return $this->maxDebit;
    }

    abstract public function credit($amount);

    abstract public function debit($amount);

    public function isOverDraft(){
        return $this->balance < 0;
    }

    public function getOverDraft(){
        return $this->isOverDraft() ? abs($this->balance) : null;
    }

    public function getBalance(){
        return $this->balance;
    }

    protected function setBalance($balance){
        if($balance > 0){
            $this->balance = $balance;
        }
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

    private function setOwner(Person $p){
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