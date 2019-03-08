<?php

//MAMP
//$db = new mysqli ('localhost', 'root', 'root', 'greatappdb');
//docker
$db = new mysqli('mysql', 'root', 'pass', 'greatappdb');
session_start();
?>