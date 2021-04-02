<?php 
if(!isset($_SESSION['id'])){
    header("Location:index.php"); 
 }
include_once "../app/Constants/Config.php";
include_once "../app/Functions/Form.php";
deconnexion();
?>