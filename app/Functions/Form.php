<?php 
//Connexion des utilisateurs
ini_set("display_errors",1);
function loginUsers(){
    if(isset($_POST['btn-login'])){
        include_once "../Config/connexion.php";
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars(trim($_POST['password']));
        $password_hash = md5($_POST['password']);
        //vérifier si le mot de passe est valide
        if(empty($password) || empty($email)){
            echo "Ce champ est requis";
        }
        elseif(strlen($password) < 8){
            echo "Au minimum 8 caractères";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Cette adresse email n est pas valide";
        }
        $sql = "SELECT * FROM users WHERE email=:email";
        $query = $bd->prepare($sql);
        $query->bindParam(":email",$email, PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch();
        if($query->rowCount() > 0){
            if($password_hash==$data['password']){
                session_start();
                $_SESSION['id'] = $data['id'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['nom'] = $data['nom'];
                $_SESSION['prenoms'] = $data['prenoms'];
                header("Location: dashboard.php");
            }else{
                echo "<script>alert('Mot de passe est Incorrect');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
        }else{
            echo "<script>alert('Adresse Email et/ou Incorrect');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
    }    
}
//Enregistrer les inscriptions
function sauvegarderInscription($requete,$action){
    
    if(isset($_POST['btn-inscrire'])){
        require "../Config/connexion.php";
        $nom = htmlspecialchars($_POST["nom"]);
        $prenoms = htmlspecialchars($_POST["prenoms"]);
        $email = htmlspecialchars($_POST["email"]);
        $genre = htmlspecialchars(trim($_POST["gender"]));
        $telephone = htmlspecialchars(trim($_POST["telephone"]));
        $lieu_habitation = htmlspecialchars(trim($_POST["lieu_habitation"]));
        //vérifier si l'apprenant est déja enregistrée
        $querySql= "SELECT COUNT(*) as total FROM apprenants WHERE email=:email";
        $query = $bd->prepare($querySql);
        $query->bindParam(":email",$email);
        $query->execute();
        $apprenantData = $query->fetch();
        if(empty($nom) || empty($prenoms) || empty($email) || empty($genre) || empty($telephone) || empty($lieu_habitation)){
            echo "Tous les champs sont requis";
            http_response_code(404);
            exit;
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            echo "Adresse email invalide";
            http_response_code(404);
            exit;
        }elseif(!filter_var($telephone,FILTER_SANITIZE_NUMBER_INT)){
            echo "Numéro de téléphone invalide";
            http_response_code(404);
            exit;
        }
        elseif($action=="add")
        {
            if($apprenantData['total']>0){
                echo "<script>alert('Adresse email est utilisée pour un autre compte');</script>";
                echo "<script>window.location.href='ajouter.php';</script>";
            }
        
        }else{
            $sql = $requete;
            $query = $bd->prepare($sql);
            $query->bindValue(":nom",$nom, PDO::PARAM_STR);
            $query->bindValue(":prenoms",$prenoms, PDO::PARAM_STR);
            $query->bindValue(":email",$email, PDO::PARAM_STR);
            $query->bindValue(":telephone",$telephone);
            $query->bindValue(":email",$email, PDO::PARAM_STR);
            $query->bindValue(":sexe",$genre);
            $query->bindValue(":lieu_habitation",$lieu_habitation);
            $query->bindValue(":date_inscription",date("Y-m-d h:i:s"));
            
            if($action=="add"){
                if($query->execute()){
                    echo "<script>alert('Apprenant est crée');</script>";
                    echo "<script>window.location.href='ajouter.php';</script>";
                }else{
                    echo "<script>alert('Vérifier vos informations');</script>";
                    echo "<script>window.location.href='ajouter.php';</script>";
                }
            }else{
               
                $query->bindValue(":id",$_POST['idApprenant']);
                if($query->execute()){
                    echo "<script>alert('Les informations de l'Apprenant ont été modifiées');</script>";
                    echo "<script>window.location.href='liste-apprenants.php';</script>";
                }else{
                    echo "<script>alert('Vérifier bien vos informations');</script>";
                    echo "<script>window.location.href='update.php';</script>";
                }
            }
            
        }
       
    }
}
//"INSERT INTO apprenants(nom,prenoms,email,telephone,sexe,lieu_habitation,date_inscription) VALUES (:nom,:prenoms,:email,:telephone,:sexe,:lieu_habitation,:date_inscription)"

//Vérifier le mot de passe
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
//Sauvegarder les présences
function enregistrerPresence(){
    
    if(isset($_POST['btn-validate'])){
        include_once "Config/connexion.php";
        //récupérer l id de l apprenant à partir de son adresse email
        $sql = "SELECT * FROM apprenants WHERE email=:email";
        $request = $bd->prepare($sql);
        $request->bindValue(":email",$_POST['email']);
        $request->execute();
        $userData = $request->fetch();
       
        if(isset($userData['email']) && $userData['email']!==NULL){
            $id = $userData['id'];
                //Vérifier qu'il y a déja une présence à la date du jour
            $date_jour = date("Y-m-d");
            $sql = "SELECT * FROM presence WHERE id_apprenant=:id AND date_jour=:date_jour";
            $request = $bd->prepare($sql);
            $request->bindValue(":id",$id);
            $request->bindValue(":date_jour",$date_jour);
            $request->execute();
            if($request->rowCount() == 0){
                $sql = "INSERT INTO presence(id_apprenant,date_jour,statut,date_ajout) VALUES (:id,:date_jour,:statut,:date_ajout)";
                $query = $bd->prepare($sql);
                $query->bindValue(":id",$id);
                $query->bindValue(":date_jour",$date_jour);
                $query->bindValue(":statut","Oui");
                $query->bindValue(":date_ajout",date("Y-m-d h:i:s"));
                $query->execute();
                echo "<script>alert('Votre présence a été enregistrée');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }else{
                echo "<script>alert('Vous êtes déja présent');</script>";
                echo "<script>window.location.href='index.php';</script>";
            }
        }
        echo "<script>alert('Votre compte n'a pas été crée');</script>";
        
    }
}
//déconnexion de l'utilisateur
function deconnexion(){
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['nom']);
    unset($_SESSION['prenoms']);
    header("Location: index.php");
}
//lNombre de présent pour le jour en cours
function nombrePresentParJour(){
      include_once "../Config/connexion.php";
     //Vérifier qu'il y a déja une présence à la date du jour
     $date_jour = date("Y-m-d");
     $sql = "SELECT COUNT(*) as total FROM presence WHERE date_jour=:date_jour";
     $request = $bd->prepare($sql);
     $request->bindParam(":date_jour",$date_jour);
     $request->execute();
     $data = $request->fetch();
     return $data['total'];
}
function afficherDataApprenant($id,$table){
    include_once "../Config/connexion.php";
    $sql = "SELECT * FROM $table WHERE id=:id";
    $query = $bd->prepare($sql);
    $query->bindParam(":id",$id);
    $query->execute();
    $data = $query->fetch();
    return $data;
}
?>