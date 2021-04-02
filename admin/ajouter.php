<?php session_start();
include_once "../app/Constants/Config.php";
include_once "../app/Functions/Form.php";
if(!isset($_SESSION['id'])){
   header("Location:index.php"); 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../<?php echo ASSETS_PATH."css/bootstrap.min.css";?>">
    <script src=""></script>
    <title>INSCRIPTION</title>
    <script src="../<?php echo ASSETS_PATH."js/jquery.min.js";?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../<?php echo ASSETS_PATH."css/style.css";?>">
</head>
<body>
    <!-- MENU -->
    <?php 
         //navbar
        include_once NAVBAR_ADMIN_PATH."navbar.php";
        sauvegarderInscription("INSERT INTO apprenants(nom,prenoms,email,telephone,sexe,lieu_habitation,date_inscription) VALUES (:nom,:prenoms,:email,:telephone,:sexe,:lieu_habitation,:date_inscription)","add");
    ?>
    <section id="registerForm" class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                        <form action="" method="post" onsubmit="return validerInscription();" class="bg-white border" id="addform">
                            <h4 class="form-title">AJOUTER UN APPRENANT</h4>
                            <p class="text-center"></p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom">
                                        <span class="text-danger" id="erreurNom"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prenoms" placeholder="Prénoms">
                                        <span class="text-danger" id="erreurPrenoms"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Adresse email">
                                        <span class="text-danger" id="erreurEmail"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="telephone" placeholder="Téléphone">
                                        <span class="text-danger" id="erreurTelephone"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        Genre:
                                        <label class="radio-inline" for="genre">Homme
                                            <input type="radio" name="gender" value="Homme">
                                        </label>
                                        <label class="radio-inline" for="genre">Femme
                                            <input type="radio" name="gender" value="Femme">
                                        </label>
                                       
                                        <br>
                                        <span class="text-danger" id="erreurGenre"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control" name="lieu_habitation" placeholder="Lieu de d'habitation">
                                        <span class="text-danger" id="erreurHabitation"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-color btn-block" name="btn-inscrire">ENREGISTRER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section>
    <?php include NAVBAR_ADMIN_PATH."footer.php"; ?>
    <script src="../<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>