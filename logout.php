<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['nom']);
unset($_SESSION['prenoms']);
header("Location: index.php");
?>