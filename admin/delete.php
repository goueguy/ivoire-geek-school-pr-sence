<?php 
    include_once "../Config/connexion.php";
    $id = $_GET['id'];
    // echo $id;
    // die;
    $sql = "DELETE FROM apprenants WHERE id=:id";
    $query = $bd->prepare($sql);
    $query->bindParam(":id",$id, PDO::PARAM_INT);
    $query->execute();
    //suppression des présences de l'apprenant
    header("Location: liste-apprenants.php");
?>