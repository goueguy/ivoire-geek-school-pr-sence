<?php 
include_once "connexion.php";

if(isset($_POST['btn-login'])){
    
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    //vérifier si le mot de passe est valide
    if(empty($password) || empty($email)){
        echo "Ce champ est requis";
    }
    elseif(strlen($password) < 8){
        echo "Au minimum 8 caractères";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Cette adresse email n est pas valide";
    }
    
    $sql = "SELECT * FROM apprenants WHERE mot_de_passe=:password AND email=:email";
    $query = $bd->prepare($sql);
    $query->bindValue(":password",$password, PDO::PARAM_STR);
    $query->bindValue(":email",$email, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    if($query->rowCount() > 0){
        session_start();
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenoms'] = $data['prenoms'];
        header("Location: index.php");
    }
    echo "<script>alert('SUCCESS');</script>";
}


?>