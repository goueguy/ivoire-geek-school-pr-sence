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
    <title>ADMIN-DASHBOARD</title>
    <script src="../<?php echo ASSETS_PATH."js/jquery.min.js";?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../<?php echo ASSETS_PATH."css/style.css";?>">
</head>
<body>
    <!-- MENU -->
    <?php 
        //navbar
        include_once NAVBAR_ADMIN_PATH."navbar.php";
    ?>
    <?php 
        if(isset($_SESSION['id'])){
            ?>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card  bg-light text-center">
                                <div class="card-body text-center p-4 bg-white">
                                    <i class="fa fa-user fa-4x"></i><br>
                                    <span id="presents"><?php echo nombrePresentParJour(); ?></span>
                                    <span>présent(s) Aujourd'hui</span>
                                </div>
                                <div class="card-header">
                                       <a href="liste-presences.php" class="text-dark">Voir Plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    <?php include NAVBAR_ADMIN_PATH."footer.php"; ?>
    <script src="<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>