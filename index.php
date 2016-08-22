<?php
require_once("Civil.php");
require_once("Enterprise.php");

$gab = new Civil("Gabriel", 500);

$gab->getBooklet()->show();

$imie = new Enterprise("IMIE");

$c1 = new Current($imie, 2000);
$c1->show();

$c1->credit(200);
$c1->show();

$c1->credit(200);
$c1->show();

$c1->debit(800);
$c1->show();

$c1->debit(800);
$c1->show();

$c1->debit(1000);
$c1->show();

$c1->debit(200);
$c1->show();

$c1->transfer($gab->getBooklet(), 300);

$c1->show();
$gab->getBooklet()->show();
