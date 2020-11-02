<?php
include "config/db_config.php";
session_start ();
?>
<!DOCTYPE html>
<html>

<?php
if (!isset($_SESSION['login'])) {
    header('location: login.php');
}
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FENOUIL | Articles</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/img_avatar.png" width="50" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo utf8_encode($_SESSION['nom']); ?></strong>
                             </span> <span class="text-muted text-xs block">Prospecteur</span> </span> </a>
                    </div>
                    <div class="logo-element">
                        FE+
                    </div>
                </li>
                <li>
                    <a href="accueil_prospecteur.php"><i class="fa fa-users"></i> <span class="nav-label">Individus</span></a>
                </li>
                <li class="active">
                    <a href="articles.php"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Articles</span></a>
                </li>
                <li>
                    <a href="creation_cible_routage.php"><i class="fa fa-dot-circle-o"></i> <span class="nav-label">Cible de routage</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Bienvenue sur <b>FE</b>NOUIL.</span>
                    </li>

                    <li>
                        <a href="logout.php">
                            <i class="fa fa-sign-out"></i> Déconnexion
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-9">
                <h2>Articles</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="accueil_prospecteur.php">Accueil</a>
                    </li>
                    <li class="active">
                        <strong>Articles</strong>
                    </li>
                </ol>
            </div>
        </div>
        

            <div class="row">
                <?php
                $req = $bdd->prepare('SELECT * FROM produit');
                $req->execute();

                while($row= $req->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-content product-box">

                                <div class="product-imitation" style="padding: 20px 0">
                                    <img alt="image" class="m-t-xs img-responsive" src="img/<?php echo $row->image; ?>">
                                </div>
                                <div class="product-desc">
                                        <span class="product-price">
                                            <?php echo $row->prix_unitaire ?>€
                                        </span>
                                    <small class="text-muted"></small>
                                    <a href="#" class="product-name"> <?php echo utf8_encode( $row->nom) ?></a>


                                    <div class="small m-t-xs">
                                        <?php echo utf8_encode($row->description) ?>
                                    </div>
                                    <div class="m-t text-righ">
                                        <span class="label label-<?php echo $row->categorie == 'Bricolage' ? 'default' :  'info'; ?> float-right"><?php echo utf8_encode($row->categorie) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="footer">
            <div>
                <strong>Copyright</strong> FENOUIL APPLICATION - MIAGE L3 &copy; 2018-2019
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>


</body>

</html>
