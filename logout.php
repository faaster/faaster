<?php

require_once '_include/authenticate-user.php';

// Suppression du token en base de donnees.

$sql = 'UPDATE users
        SET token = :reset
        WHERE token = :my_token';

$token = mt_rand();

$r = $db->prepare($sql);
$r->execute(array(
	'reset'    => $token,
	'my_token' => $user['token']
));
$r->closeCursor();

// Redirection vers la page d'accueil.

header('Location: index.php');

?>
