<?php
session_start();

if(prijavljen()){
$session_uporabnikID = $_SESSION['uporabnikID'];
}
?>