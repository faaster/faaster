<?php

// Authentification

require_once '_include/connection.php';

if (!isset($_GET['my_token'])) {
  exit('Non autorisé: le token est introuvable.');
}

$sql = 'SELECT *
        FROM `users`
        WHERE token = ?';

$r = $db->prepare($sql);
$r->execute(array($_GET['my_token']));

if ($r->rowCount() != 1) {
  exit('Non autorisé: le token est invalide.');
}

$user = $r->fetch();

?>
