<?php
require_once("Civil.php");
require_once("Enterprise.php");

$gab = new Civil("Gabriel", 500);

$gab->getBooklet()->show();

$imie = new Enterprise("IMIE");

$c1 = new Current($imie, 2000);
$c1->show();

echo "<hr/>CREDIT : " . Bank::euroToFranc(200);
$c1->credit(200);
$c1->show();

echo "<hr/>CREDIT : " . Bank::euroToFranc(100);;
$c1->credit(100);
$c1->show();

echo "<hr/>DEBIT : " . Bank::euroToFranc(700);;
$c1->debit(700);
$c1->show();

echo "<hr/>DEBIT : " . Bank::euroToFranc(200);;
$c1->debit(800);
$c1->show();

echo "<hr/>DEBIT : " . Bank::euroToFranc(1000);;
$c1->debit(1000);
$c1->show();

echo "<hr/>DEBIT : " . Bank::euroToFranc(200);;
$c1->debit(200);
$c1->show();

echo "<hr/>VIREMENT : " . Bank::euroToFranc(300);;
$c1->transfer($gab->getBooklet(), 300);

$c1->show();
$gab->getBooklet()->show();
