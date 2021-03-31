<?php include_once "connexion.php";
    if(isset($_POST['btn-inscrire'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenoms = htmlspecialchars($_POST['prenoms']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars(trim($_POST['password']));
        $password_hash = password_hash($password,PASSWORD_BCRYPT);
        //vérifier si le mot de passe est valide
        $errors = verifierMotPasse($password);
        if(empty($password) || empty($email)){
            echo "Ce champ est requis";
        }elseif(!empty($errors)){
            echo "<script>alert('$errors');</script>";
            echo "<script>window.location.href='inscription.php';</script>";
        }
        elseif(strlen($password) < 8){
            echo "Au minimum 8 caractères";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Cette adresse email n'est pas valide";
        }else{
            $sql = "INSERT INTO apprenants(nom,prenoms,email,mot_de_passe,date_inscription) VALUES (:nom,:prenoms,:email,:mot_de_passe,:date_inscription)";
            $query = $bd->prepare($sql);
            $query->bindValue(":nom",$nom, PDO::PARAM_STR);
            $query->bindValue(":prenoms",$prenoms, PDO::PARAM_STR);
            $query->bindValue(":email",$email, PDO::PARAM_STR);
            $query->bindValue(":mot_de_passe",$password_hash);
            $query->bindValue(":date_inscription",date("Y-m-d h:i:s"));
            if($query->execute()){
                echo "<script>alert('Votre candidature est validée');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }else{
                echo "<script>alert('Adresse Email ou mot de passe incorrect');</script>";
                echo "<script>window.location.href='inscription.php';</script>";
            }
        }
       
    }
    
    function verifierMotPasse($pass){
        if(strlen($pass) < 8){
            $errors = "Ce mot de passe doit avoir au moins 8 caractères";
        }
        if(!preg_match("@[0-9]@",$pass)){
            $errors = "Ce mot de passe doit avoir au moins un chiffre";
        }
        if(!preg_match("@[A-Z]@",$pass)){
            $errors = "Ce mot de passe doit avoir au moins une lettre majuscule";
        }
        if(!preg_match("@[a-z]@",$pass)){
            $errors = "Ce mot de passe doit avoir au moins une lettre minuscule";
        }
        if(!preg_match("@[^\w]@",$pass)){
            $errors = "Ce mot de passe doit avoir au moins un caractère spécial comme @ ou # etc.";
        }
        return $errors;
    }
?>