<?php

require_once '_include/connection.php';

// Authentification
$sql = 'SELECT password
        FROM `users`
        WHERE email = ?';

$r = $db->prepare($sql);

$r->execute(array($_POST['email']));

if ($r->rowCount() != 1) {
  exit("L'adresse email est introuvable.");
}

$user = $r->fetch();

if ($user['password'] != $_POST['password']) {
  exit('Le mot de passe est incorrect.');
}

// Creation d'un nouveau token unique en base de donnees.

$token = mt_rand();

$sql = 'UPDATE users
        SET token = ?
        WHERE email = ?';

$r = $db->prepare($sql);
$r->execute(array($token, $_POST['email']));
$r->closeCursor();

header('Location: functions.php?my_token=' . $token);

?> 
