<?php

require_once '_include/authenticate-user.php';

// Création de la fonction.

$sql = 'INSERT INTO functions(title, code, user_id)
        VALUES(:title, :code, :user_id)';

$req = $db->prepare($sql);
$req->execute(array(
	'title'    => $_POST['title'],
	'code'     => $_POST['code'],
  'user_id'  => $user['id']
));

// Redirection vers la page d'accueil pour lister les fonctions du développeur.
header('Location: functions.php?my_token=' . $user['token']);

?>
