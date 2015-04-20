<?php
// --------------------------
// Display errors to browser
error_reporting(E_ALL);
ini_set("display_errors", 1);
// --------------------------
$host=""; 
$user="jjl8705";
$password="dragonboyman55";
$database="cs4601_jjl8705";

// Connect to the database
$connect = mysql_connect($host,$user,$password);
// Select the database
@mysql_select_db($database) or die("Unable to select database");
session_start();
?>