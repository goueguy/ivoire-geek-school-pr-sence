<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container-fluid">
            <a class="navbar-brand " href="index.php"><img src="images/logo-igs2.png" style="width:90px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php 
                        if(isset($_SESSION['id'])){
                           
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link"  href='ajouter.php'> <i class="fa fa-plus"></i>&nbsp;Ajouter une présence</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link " aria-current="page" href="index.php"><i class="fa fa-list"></i>&nbsp;Liste des Présences</a>
                                </li> 
                            <?php
                        }else{
                            ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link apps-title">IV-Presence</a>
                                </li>
                            <?php
                        }
                    ?>
                    <?php 
                        if(isset($_SESSION['id'])){
                            ?>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="#"><i class="fa fa-user"></i>&nbsp;<?php if(isset($_SESSION['nom'])){ echo $_SESSION['nom']." ".$_SESSION['prenoms'];}?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="logout.php"><i class="fa fa-sign-out"></i>Déconnexion</a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
    </div>
</nav>