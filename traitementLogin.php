<?php include_once "connexion.php";
if(isset($_POST['btn-login'])){
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(trim($_POST['password']));
    $password_hash = password_hash($password,PASSWORD_BCRYPT);
    //vérifier si le mot de passe est valide
    if(empty($password) || empty($email)){
        echo "Ce champ est requis";
    }
    elseif(strlen($password) < 8){
        echo "Au minimum 8 caractères";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Cette adresse email n est pas valide";
    }
    $sql = "SELECT * FROM apprenants WHERE email=:email";
    $query = $bd->prepare($sql);
    $query->bindParam(":email",$email, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    if($query->rowCount() > 0){
        if(password_verify($password,$data['mot_de_passe'])){
            session_start();
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['prenoms'] = $data['prenoms'];
            header("Location: index.php");
        }else{
            echo "<script>alert('Mot de passe est Incorrect');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }else{
        echo "<script>alert('Adresse Email et/ou Incorrect');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}

?>