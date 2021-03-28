<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>ACCUEIL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ACCUEIL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">john</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-sign-out"></i>Déconnexion</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
    <section id="formulaire" class="mt-4">
        <div class="container">
            
            <div class="row">
                <!-- INSCRIPTION FORMULAIRE -->
                <div class="col-lg-6">
                <h4 class="form-title">INSCRIPTION</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="prenoms" placeholder="Prénoms">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Adresse email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btn-inscrire">S'INSCRIRE</button>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- LOGIN FORMULAIRE-->
                <div class="col-lg-6">
                        <form action="traitementLogin.php" method="POST" onsubmit="">
                            <h4 class="form-title">LOGIN</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Adresse email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" name="btn-inscrire">SE CONNECTER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            
        </div>
    </section>
</body>
</html>