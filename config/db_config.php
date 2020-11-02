<?php
/**
 * Created at :
 * Date: 19/11/2018
 * Time: 22:54
 */

$host = "localhost";
$dbname = "fenouil";
$user = "root";
$mdp = "";

try{
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $mdp);

} catch (Exception $e) {
    die('Erreur de connexion à la base .. ');
}
?>
