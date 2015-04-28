<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>

<?php
// --------------------------
// Display errors to browser
error_reporting(E_ALL ^ E_DEPRECATED);
ini_set("display_errors", 1);
// --------------------------
//$host=""; 
//$user="jjl8705";
//$password="dragonboyman55";
//$database="cs4601_jjl8705";

$host=""; 
$user="groupK";
//$user="arm8759";
$password="groupKpass";
//$password="tFKslrSM";
$database="cs4601_groupK";
// Connect to the database
$connect = mysql_connect($host,$user,$password);
// Select the database
@mysql_select_db($database) or die("Unable to select database");
session_start();
?>