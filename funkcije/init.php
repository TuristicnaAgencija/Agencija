<?php
session_start();

$currentFile = explode('/', $_SERVER['SCRIPT_NAME']);
$currentFile = end($currentFile);

if(prijavljen()){
$session_uporabnikID = $_SESSION['uporabnikID'];
}
?>