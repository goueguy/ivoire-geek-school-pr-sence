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
                        <div class="col-lg-12">
                            <h4>Présences</h4>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-border">
                                <tr>
                                    <th>N°</th>
                                    <th>Nom & Prénoms</th>
                                    <th>Date du Jour</th>
                                    <th>Présence</th>
                                </tr>
                                <?php 
                                    include_once "../Config/connexion.php";
                                    $sql = "SELECT apprenants.id,apprenants.nom,apprenants.prenoms,presence.id_apprenant,presence.date_jour, presence.statut FROM apprenants INNER JOIN presence ON apprenants.id = presence.id_apprenant";
                                    $query = $bd->prepare($sql);
                                
                                    $query->execute();
                                    $data = $query->fetchAll();
                                    //var_dump($data);
                                    foreach ($data as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $key+1; ?></td>
                                                <td><?php echo $value['nom'].' '.$value['prenoms'];?></td>
                                                <td><?php echo $value['date_jour'];?></td>
                                                <td>
                                                <?php 
                                                    if($value['statut']=="Oui"){
                                                        ?>
                                                        <span class='badge badge-success'>
                                                            <?php echo $value['statut'];?>
                                                        </span>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <span class='badge badge-danger'>
                                                            <?php echo $value['statut'];?>
                                                        </span>
                                                        <?php
                                                    }
                                                ?>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            <?php
        }
    ?>
    <?php include NAVBAR_ADMIN_PATH."footer.php"; ?>
    <script src="../<?php echo ASSETS_PATH."js/script.js";?>"></script>
</body>
</html>