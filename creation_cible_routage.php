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
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

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
                <li>
                    <a href="articles.php"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Articles</span></a>
                </li>
                <li class="active">
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
                <h2>Cible de routage</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="accueil_prospecteur.php">Accueil</a>
                    </li>
                    <li class="active">
                        <strong>Création d'une cible de routage</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Création d'une cible de routage</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <form id="form" action="#">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Catégories socio-professionnelles concernées</label>
                                            <select name="categories" data-placeholder="Sélectionner les catégories" class="chosen-select" multiple="" style="width: 350px; display: none;" tabindex="-1">
                                                <option value="Cadres et professions intellectuelles supérieures">Cadres et professions intellectuelles supérieures</option>
                                                <option value="Professions intermédiaires">Professions intermédiaires</option>
                                                <option value="Employés">Employés</option>
                                                <option value="Professions intermédiaires">Professions intermédiaires</option>
                                            </select>
                                        </div>
                                        <?php
                                        $req = $bdd->prepare('SELECT DISTINCT(dpt_residence) FROM client');
                                        $req->execute();
                                        ?>
                                            <div class="col-lg-6">
                                                <label>Départements concernés : </label>
                                                <select name="departements" data-placeholder="Sélectionner les départements" class="chosen-select" multiple="" style="width: 350px; display: none;" tabindex="-1">
                                                    <?php
                                                    while($row= $req->fetch(PDO::FETCH_OBJ)) {
                                                        ?>
                                                        <option
                                                            value="<?php echo $row->dpt_residence ?>">
                                                            <?php echo $row->dpt_residence ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Âge cible :</label>
                                            <div name = "age" id="age"></div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Déjà client :</label>
                                            <select name="deja-client" class="chosen-select"  style="width: 350px; display: none;" tabindex="-1">
                                                <option value="">-</option>
                                                <option value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Type :</label>
                                            <select name="type" id="type" class="chosen-select"  style="width: 350px; display: none;" tabindex="-1">
                                                <option value="Catalogue papier">Catalogue papier</option>
                                                <option value="Canaux internet">Canaux internet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Titre :</label>
                                            <input name="titre" type="text" class="form-control">
                                        </div>
                                        <div class="col-lg-6" id="qualite-papier-block">
                                            <label>Qualité papier :</label>
                                            <select id="qualite" name="qualite" class="chosen-select"  style="width: 350px; display: none;" tabindex="-1">
                                                <option value="Standard">Standard</option>
                                                <option value="Supérieur">Supérieur</option>
                                                <option value="Économique">Économique</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <?php
                                        $req = $bdd->prepare('SELECT * FROM produit');
                                        $req->execute();
                                        ?>
                                        <div class="col-lg-12">
                                            <label>Produits concernés : </label>
                                            <select name="produits" data-placeholder="Sélectionner les produits" class="chosen-select" multiple="" style="width: 350px; display: none;" tabindex="-1">
                                                <?php
                                                while($row= $req->fetch(PDO::FETCH_OBJ)) {
                                                    ?>
                                                    <option
                                                        value="<?php echo $row->id ?>">
                                                        <?php echo utf8_encode($row->nom) . ' - ' . utf8_encode($row->categorie) . ' - ' . $row->prix_unitaire . ' €'  ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Description :</label>
                                            <textarea name="titre" class="form-control"></textarea>
                                            <style>
                                                textarea { resize: vertical; }
                                            </style>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <button class="btn btn-sm btn-primary float-right m-t-n-xs pull-right" type="submit"><strong>Créer</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- Steps -->
<script src="js/plugins/steps/jquery.steps.min.js"></script>
<!-- Jquery Validate -->
<script src="js/plugins/validate/jquery.validate.min.js"></script>

<!-- MENU -->
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- IonRangeSlider -->
<script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>


<script>
    $(document).ready(function(){
        $('#type').change(function () {
            var type = $('#type').val();

            if (type == "Catalogue papier") {
                $('#qualite-papier-block').show();
            } else {
                $('#qualite-papier-block').hide();
            }
        });
        $("#age").ionRangeSlider({
            min: 20,
            max: 100,
            type: 'double',
            maxPostfix: "+",
            prettify: false,
            hasGrid: true,
        });
    });
    $('.chosen-select').chosen({width: "100%"});
</script>

</body>

</html>