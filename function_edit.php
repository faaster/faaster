<?php

require_once '_include/authenticate-user.php';

// Si il n'y a pas l'ID de la fonction à éditer.
if (!isset($_GET['function_id'])) {
  exit("Le parametre 'function_id' n'est pas present dans l'URL");
}

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
      <h2>Modification d'une fonction</h2>

      <form action="function_edit-post.php?my_token=<?php echo $user['token']; ?>&function_id=<?php echo $function['id']; ?>" method="post">
        <div>
          <label>
            Titre<br />
            <input id="title" name="title" value="<?php echo $function['title']; ?>" type="text" placeholder="Titre" required>
          </label>
        </div>

        <div>
          <label>
            Code PHP<br />
            <textarea name="code" placeholder="Code PHP" rows="10"><?php echo $function['code']; ?></textarea>
          </label>
        </div>

        <div>
          <input type="submit" value="Mettre à jour la fonction">
        </div>
      </form>
    </article>
  </body>
</html>
