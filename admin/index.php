<?php session_start();
include_once "../app/Constants/Config.php";
include_once "../app/Functions/Form.php";
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../<?php echo ASSETS_PATH."css/bootstrap.min.css";?>">
    <script src=""></script>
    <title>LOGIN</title>
    <script src="../<?php echo ASSETS_PATH."js/jquery.min.js";?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../<?php echo ASSETS_PATH."css/style.css";?>">
</head>
<body>
    <!-- MENU -->
   
    <?php 
        
        loginUsers();
        //navbar
        include_once NAVBAR_ADMIN_PATH."navbar.php";
        if(!isset($_SESSION['id'])){
            ?>
                <section id="loginForm" class="mt-5">
                    <div class="container">
                        <div class="row">
                            <!-- INSCRIPTION FORMULAIRE -->
                            <div class="col-lg-6">
                                <img src="../<?php echo PICTURES_PATH."login.png";?>" class="loginImage" alt="">
                            </div>
                            <!-- LOGIN FORMULAIRE-->
                            <div class="col-lg-6">
                                    <form action="" method="POST" 
                                    onsubmit="return validerLogin();">
                                        <h4 class="form-title">LOGIN</h4>
                                        <p class="text-center">(Connectez-vous à l'espace admin)</p>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email">
                                                    <span class="text-danger font-weight-bold" id="error"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                                    <span class="text-danger font-weight-bold" id="erreurmotdepasse"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-color btn-block" name="btn-login">SE CONNECTER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </section>
            <?php
        }
    ?>
  
    <?php include VIEWS_INCLUDES_PATH."footer.php"; ?>
    <script src="../<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>