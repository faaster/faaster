<?php

require_once '_include/authenticate-user.php';

// Si il n'y a pas l'ID de la fonction à éditer.
if (!isset($_GET['function_id'])) {
  exit("Le parametre 'function_id' n'est pas present dans l'URL");
}

// Mise a jour du code de la fonction.

$sql = 'UPDATE functions
        SET code = ?, title = ?
        WHERE id = ?';

$r = $db->prepare($sql);
$r->execute(array($_POST['code'], $_POST['title'], $_GET['function_id']));
$r->closeCursor();

// Redirection vers la page d'accueil pour lister les fonctions du développeur.
header('Location: functions.php?my_token=' . $user['token'] . '&function_id=' . $_GET['function_id']);

?>
