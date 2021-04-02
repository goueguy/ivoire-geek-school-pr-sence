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
                <div class="container mt-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Apprenants</h4>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="thead-light">
                                        <th>N°</th>
                                        <th>Nom & Prénoms</th>
                                        <th>Email</th>
                                        <th>Sexe</th>
                                        <th>Lieu d'Habitation</th>
                                        <th>Date inscription</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    include_once "../Config/connexion.php";
                                    $sql = "SELECT * FROM apprenants";
                                    $query = $bd->prepare($sql);
                                
                                    $query->execute();
                                    $data = $query->fetchAll();
                                    //var_dump($data);
                                    foreach ($data as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $key+1; ?></td>
                                                <td><?php echo $value['nom'].' '.$value['prenoms'];?></td>
                                                <td><?php echo $value['email'];?></td>
                                                <td><?php echo $value['sexe'];?></td>
                                                <td><?php echo $value['lieu_habitation'];?></td>
                                                <td><?php echo $value['date_inscription'];?></td>
                                                <td>
                                                    <a href="delete.php?id=<?php echo $value['id'];?>" onclick="return confirm('Êtes-vous sure de vouloir supprimer cet apprenant ?');"><i class="fa fa-trash text-dark"></i></a>
                                                    <a href="update.php?id=<?php echo $value['id'];?>" onclick="return confirm('Voulez-vous modifier une information de l\'apprenant ?');"><i class="fa fa-edit text-dark"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
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