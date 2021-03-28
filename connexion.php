<?php 

$servername = "localhost";
$database_name ="bd_presence";
$username = "root";
$password = "";

try {
    
    $bd = new PDO("mysql:host=$servername;charset=utf8;dbname=$database_name",$username,$password);
    $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "CONNECTED.....";
} catch (PDOException $e) {
    
    echo "Connexion a échoué".$e->getMessage();
}

?>