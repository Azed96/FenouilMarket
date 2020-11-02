<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fenouil | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">FE+</h1>

            </div>
            <h3>Bienvevue sur <b>FE</b>NOUIL</h3>
            <p>Application conçue pour proposer les meilleurs produits de décoration et bricolage avec un meilleur suivi des commandes.
            </p>
            <p>Connectez-vous pour bénéficier des différentes fonctionnalités.</p>
            <?php
                if (isset($_GET['erreurLogin'])) {
                    echo '<div class="alert alert-danger alert-dismissible">';
                    echo    '<button type="button" class="close" data-dismiss="alert"></button>';
                    echo '<h4><i class="icon fa fa-ban"></i> Erreur</h4>';
                    echo 'Identification échouée ! Veuillez réessayer ...';
                    echo '</div>';
                }

            ?>
            <form id="loginForm" class="m-t" role="form" action="check_login.php" method="post">
                <div class="form-group">
                    <input name ="login" type="text" class="form-control" placeholder="Identifiant" required="true">
                </div>
                <div class="form-group">
                    <input name ="mdp" type="password" class="form-control" placeholder="Mot de passe" required="true">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Connexion</button>

                <p class="text-muted text-center"><small>Pas encore inscrit ?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Créer un compte</a>
            </form>
            <p class="m-t"> <small>FENOUIL APPLICATION - MIAGE L3 &copy; 2018-2019</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
