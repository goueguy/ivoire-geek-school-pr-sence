
<nav class="navbar navbar-expand-lg navbar-light bg-white">
<a class="navbar-brand " href="dashboard.php"><img src="<?php echo PICTURES_PATH_ADMIN."logo-igs2.png";?>" style="width:90px" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
                <?php 
                    if(!isset($_SESSION['id'])){
                        ?>
                         <li class="nav-item">
                            <a class="nav-link" href="#">&nbsp;I-Presence</a>
                        </li>
                        <?php
                    }
                ?>
               
    <?php 
        if(isset($_SESSION['id'])){
            ?>
                <li class="nav-item active">
                    <a class="nav-link" href="dashboard.php"><i class="fa fa-home"></i>&nbsp;Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-o"></i> Apprenants
                    </a>
                    <div class="dropdown-menu" aria-labelledby="appDropdown">
                    <a class="dropdown-item" href="ajouter.php">Ajouter</a>
                    <!-- <a class="dropdown-item" href="#">Déconnexion</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="liste-apprenants.php">Liste</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog"></i> Paramètres
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['nom'].' '.$_SESSION['prenoms'];?></a>
                    <!-- <a class="dropdown-item" href="#">Déconnexion</a> -->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i> Déconnexion</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="liste-presences.php"><i class="fa fa-list"></i>&nbsp;Présences</a>
                </li>
            <?php
        }
    ?>
   
    </ul>
    
  </div>
</nav>