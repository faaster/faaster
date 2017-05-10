<?php

// Parametres
$host = 'localhost';
$dbname = 'faaster';
$username = 'root';
$password = 'root';

// Tentative de connexion a la base de donnees.
try {
  $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

catch (Exception $e) {
  // Echec.  Il faut arreter le script en affichant l'erreur.
  die('Error: ' . $e->getMessage());
}

?>
