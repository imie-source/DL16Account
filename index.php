<?php
require_once("Civil.php");
require_once("Enterprise.php");

$gab = new Civil();

$imie = new Enterprise();

$c1 = new Current($imie);
$c2 = new Current($imie);

var_dump($c1);
var_dump($c2);