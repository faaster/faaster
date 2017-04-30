<?php

require_once '_include/authenticate-user.php';

// Si il existe une demande de lecture du code.
if (isset($_GET['function_id'])) {
  // Chargement du code de la fonction...
  $sql = 'SELECT *
          FROM `functions`
          WHERE id = ?';

  $r = $db->prepare($sql);

  $r->execute(array($_GET['function_id']));

  if ($r->rowCount() != 1) {
    exit('Cette fonction est introuvable.');
  }

  $function = $r->fetch();
}

?>

<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <title>FaaSter</title>
    <link href="style.css" rel="stylesheet" />
  </head>

  <body>
    <header>
      <h1>FaaSter</h1>
    </header>

    <hr />

    <nav>
      <ul>
        <li><a href="functions.php?my_token=<?php echo $user['token']; ?>">Mes fonctions</a></li>
        <li><a href="payment-history.php?my_token=<?php echo $user['token']; ?>">Historique des paiements</a></li>
        <li><a href="logout.php?my_token=<?php echo $user['token']; ?>">Se déconnecter</a></li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2>Historique des paiements</h2>

      <p>
        Mois de janvier 2017.
      </p>
    </article>
  </body>
</html>
