<?php

$loader = require __DIR__ . "/../vendor/autoload.php";


use Goldfinger\Console;


$c = new Console();

$c->header("PHP?", "gold" , "blue");
$c->log("Breakpoint 1");
$c->error("Something is Fishy going here");
$c->warn("This is your last warning!");
$c->count("How many time this thing was called?");
$c->count("How many time this thing was called?");
$c->count("How many time this thing was called?");


$c->show();
