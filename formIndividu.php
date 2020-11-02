

 
<?php
// Parametres mysql à remplacer par les vôtres
define('DB_SERVER', 'localhost'); // serveur mysql
define('DB_SERVER_USERNAME', 'root'); // nom d'utilisateur
define('DB_SERVER_PASSWORD', ''); // mot de passe
define('DB_DATABASE', 'fenouil'; // nom de la base
 
// Connexion au serveur mysql
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME, 
DB_SERVER_PASSWORD) 
or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db(DB_DATABASE, $connect);
 
$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis :<br/><br/>";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;
 
// vérification des champs 

if (empty($_POST['nom'])) 
  $message .= "Votre nom<br/>";
if (empty($_POST['age'])) 
  $message .= "Votre age<br/>";
if (empty($_POST['categorie'])) 
  $message .= "Votre categorie<br/>";
if (empty($_POST['dpt_residence'])) 
  $message .= "Votre code postal<br/>";


 
 
// si un champ est vide, on affiche le message d'erreur 
if (strlen($message) > strlen($msg_erreur)) {
 
  echo $message;
 
// sinon c'est ok 
} else {
 
  foreach($_POST as $index => $valeur) {
    $$index = mysql_real_escape_string(trim($valeur));
  }
 
  $interets = $_POST['interets'];
  $sqlinterets = '';
  for ($i=0; $i<count($interets); $i++)
  {
    $sqlinterets .= $interets[$i];
    $sqlinterets .= ', ';
  }
 
  $sql = "INSERT INTO client(nom, age, categorie,dpt_residence) VALUES ('".$nom."', '".$age."', '".$categorie."', '".$dpt_residence."')";
  $res = mysql_query($sql);
 
  if ($res) {
    echo $msg_ok;
  } else {
    echo mysql_error();
  }
 
}
?>
