<?php
include "config/db_config.php";

if (isset($_POST['login']) && isset ($_POST['mdp'])) {
    $login = $_POST['login'];
    $mdpForm = $_POST['mdp'];

    $req = $bdd->prepare('SELECT * FROM utilisateur u WHERE u.login LIKE ?');
    $req->execute(array($login));
    $row= $req->fetch(PDO::FETCH_OBJ);

    if ($row != null && password_verify($mdpForm, $row->mdp)) {
        session_start();
        $userRole = $row->role;
        $_SESSION['login'] = $row->login;
        $_SESSION['nom'] = $row->nom;
        $_SESSION['role'] = $row->role;

        switch ($userRole) {
            case 'prospecteur':
                header('location: accueil_prospecteur.php');
                break;

            default:
                throw new Exception('Unknown user role ! ');

        }

    } else {
       header('location: login.php?erreurLogin=1');
    }

}