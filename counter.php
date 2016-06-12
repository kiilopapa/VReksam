<?php
/**
 * Created by PhpStorm.
 * User: kristjan
 * Date: 12/06/16
 * Time: 13:11
 *
 *
 * help from http://hibbard.eu/how-to-make-a-simple-visitor-counter-using-php/
 */
session_start();
$counter_name = "counter.txt";
// Check if a text file exists. If not create one and initialize it to zero.
if (!file_exists($counter_name)) {
    $f = fopen($counter_name, "w");
    fwrite($f,"0");
    fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
// Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){
    $_SESSION['hasVisited']="yes";
    $counterVal++;
    $f = fopen($counter_name, "w");
    fwrite($f, $counterVal);
    fclose($f);
}
echo "You are visitor number $counterVal to this site";