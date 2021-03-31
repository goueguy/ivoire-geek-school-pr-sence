<?php 
ini_set("display_errors", 1);
include_once "connexion.php";

if(isset($_POST['btn-validate'])){
        session_start();
        //vérifier si 
        $statut = $_POST['statut'];
        // session_start();
        $id = $_POST['id'];
        $date = $_POST['date_jour'];
        //Vérifier qu'il y a déja une présence à la date du jour
        $date_jour = date("Y-m-d");
        $sql = "SELECT * FROM presence WHERE id_apprenant=:id AND date_jour=:date_jour";
        $request = $bd->prepare($sql);
        $request->bindValue(":id",$id);
        $request->bindValue(":date_jour",$date_jour);
        $request->execute();
        $dataRequest = $request->fetch();
        
        if($request->rowCount() == 0){
            $sql = "INSERT INTO presence(id_apprenant,date_jour,statut,date_ajout) VALUES (:id,:date_jour,:statut,:date_ajout)";
            $query = $bd->prepare($sql);
            $query->bindValue(":id",$id);
            $query->bindValue(":date_jour",$date);
            $query->bindValue(":statut",$statut);
            $query->bindValue(":date_ajout",date("Y-m-d h:i:s"));
            $query->execute();
            echo "<script>window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Vous êtes déja présent');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
        
       
}
?>