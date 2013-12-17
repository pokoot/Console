<?php

$loader = require __DIR__ . "/../vendor/autoload.php";


use Goldfinger\Console;


$c = new Console();

$c->header("Basic Usage", "yellow" , "green");
$c->log("Breakpoint 1");
$c->error("Something is Fishy going here");
$c->warn("This is your last warning!");
$c->count("How many time this thing was called?");
$c->count("How many time this thing was called?");
$c->count("How many time this thing was called?");


$c->header("Indented Query String");
$query = "
    SELECT *,
        created_date
    FROM user AS u
    WHERE type = 'admin'
    LIMIT 20,30
";

$c->log($query);


$c->header("Arrays");

$array = array("test 1", "test 2" , 'test " " " 3\'');

$c->log($array);

$c->show();
