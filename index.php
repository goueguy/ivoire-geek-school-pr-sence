<?php session_start();
include_once "app/Constants/Config.php";
include_once "app/Functions/Form.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH."css/bootstrap.min.css";?>">
    <title>ACCUEIL</title>
    <script src="<?php echo ASSETS_PATH."js/jquery.min.js";?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH."css/style.css";?>">
</head>
<body>
    <!-- MENU -->
    <?php 
        enregistrerPresence();
        //navbar
        include_once VIEWS_INCLUDES_PATH."navbar.php";
        // $dateNow = Date('now');
        // $heureExpired = 
       ?>
        <section id="loginForm" class="mt-5">
            <div class="container">
                <div class="row">
                    <!-- INSCRIPTION FORMULAIRE -->
                    <div class="col-lg-6">
                        <img src="<?php echo PICTURES_PATH."login.png";?>" class="loginImage" alt="">
                    </div>
                    <!-- LOGIN FORMULAIRE-->
                    <div class="col-lg-6">
                            <form action="" method="POST" 
                            onsubmit="return validerPresence();">
                                <h4 class="form-title">PRÉSENCE</h4>
                                <p class="text-center display-5">(Marquer votre présence d'aujourd'hui)</p>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email">
                                            <span class="text-danger font-weight-bold" id="erreurEmail"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-color btn-block" name="btn-validate">MARQUER</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </section>
    <?php include VIEWS_INCLUDES_PATH."footer.php"; ?>
    <script src="<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>