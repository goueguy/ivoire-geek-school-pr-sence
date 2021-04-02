<?php 
session_start();
include_once "app/Constants/Config.php";
include_once "app/Functions/Form.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH."css/bootstrap.min.css";?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ACCUEIL</title>
    <script src="<?php echo ASSETS_PATH."js/jquery.min.js";?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH."css/style.css";?>">
</head>
<body>
    <?php 
      include_once VIEWS_INCLUDES_PATH."navbar.php";
      enregistrerPresence();
    ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mt-5">
                <form action="" method="POST" onsubmit="return validateAddForm();">
                    <h4 class="form-title">Présence pour la date d'Aujourd'hui: <b><?php echo date("d-m-Y");?></b></h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="statut" name="statut" value="Oui">
                                <input type="hidden" name="id" value="<?= $_SESSION['id']; ?>">
                                <input type="hidden" name="date_jour" value="<?= date("Y-m-d"); ?>">
                                <span class="text-danger font-weight-bold" id="error"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block" name="btn-validate">MARQUER SA PRÉSENCE D'AUJOURD'HUI</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include VIEWS_INCLUDES_PATH."footer.php"; ?>
    <script src="<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>