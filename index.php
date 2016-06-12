<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Eksam</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
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
$last_visit = "last_visit.txt";

// Check if a text file exists. If not create one and initialize it to zero.
$time = time();
if (!file_exists($counter_name)) {
    $f = fopen($counter_name, "w");
    fwrite($f,"1");
    fclose($f);
}
if (!file_exists($last_visit)) {
    $f = fopen($last_visit, "w");
    fwrite($f, $time);
    fclose($f);
}
// Read the current value of our counter file
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);

$f = fopen($last_visit,"r");
$last_visit_time = fread($f, filesize($last_visit));
fclose($f);

// Has visitor been counted in this session?
// If not, increase counter value by one
/*if(!isset($_SESSION['hasVisited'])){
    $_SESSION['hasVisited']="yes";
    $counterVal++;
    $f = fopen($counter_name, "w");
    fwrite($f, $counterVal);
    fwrite($f, $time);
    fclose($f);
}
*/
//echo "$counterVal";
$counterVal++;
echo "<br>";
//echo "$counterVal";

    $f = fopen($counter_name, "w");
    fwrite($f, $counterVal);
    fclose($f);

    $f = fopen($last_visit, "w");
    fwrite($f, $time);
    fclose($f);
$last_visit_time = date('c', $last_visit_time);
echo "<p>You are visitor number $counterVal to this site, last visit took place $last_visit_time</p>";
?>



</body>
</html>