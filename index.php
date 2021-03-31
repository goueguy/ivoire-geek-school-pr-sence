<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src=""></script>
    <title>LOGIN</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- MENU -->
    <?php 
        include "navbar.php";
        if(!isset($_SESSION['id'])){
            ?>
                <section id="loginForm" class="mt-5">
                    <div class="container">
                        <div class="row">
                            <!-- INSCRIPTION FORMULAIRE -->
                            <div class="col-lg-6">
                                <img src="images/login.png" class="loginImage" alt="">
                            </div>
                            <!-- LOGIN FORMULAIRE-->
                            <div class="col-lg-6">
                                    <form action="traitementLogin.php" method="POST" 
                                    onsubmit="return validerLogin();">
                                        <h4 class="form-title">LOGIN</h4>
                                        <p class="text-center">(Connectez-vous à votre compte)</p>
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
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-color btn-block" name="btn-login">SE CONNECTER</button>
                                                </div>
                                               
                                            </div>
                                            <div class="col-lg-7">
                                                <a href="inscription.php" class="text-center loginLink"><i class="fa fa-link"></i>&nbsp;Cliquez ici si vous n'avez pas de compte</a>
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
    <?php 
        if(isset($_SESSION['id'])){
            ?>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Liste des Présences</h4>
                        </div>
                        <div class="col-lg-12">
                            <table class="table table-border">
                                <tr>
                                    <th>N°</th>
                                    <th>Date du Jour</th>
                                    <th>Présence</th>
                                </tr>
                                <?php 
                                    include "connexion.php";
                                    $sql = "SELECT apprenants.id,presence.id_apprenant,presence.date_jour, presence.statut FROM apprenants INNER JOIN presence ON apprenants.id = presence.id_apprenant WHERE presence.id_apprenant=:id";
                                    $query = $bd->prepare($sql);
                                    $query->bindValue(":id",$_SESSION['id']);
                                    $query->execute();
                                    $data = $query->fetchAll();
                                    //var_dump($data);
                                    foreach ($data as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $key+1; ?></td>
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
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="copyright">&copy; Copyright-2021, <a href="https://ivoiregeekschool.com" target='_blank'>Ivoire Geek School</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>