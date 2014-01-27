<?php
$username = "james";
$password = "12345";
$hostname = "localhost"; 
$dbname="interface";
//connect to server and select database.
mysql_connect("$hostname","$username","$password")or die("cannot connect to server");
mysql_select_db("$dbname")or die("cannot select DB");
$loginid='';
?>