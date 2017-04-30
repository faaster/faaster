  <?php

  require_once '_include/authenticate-user.php';

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

        <p>
          Bonjour, <?php echo $user['full_name'] ?> !
        </p>
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
        <h2>Mes fonctions</h2>

        <ul>
          <?php
          $sql = 'SELECT *
                  FROM `users`, `functions`
                  WHERE users.id = functions.user_id
                    AND users.id = ?';

          $req = $db->prepare($sql);
          $req->execute(array($user['id']));

          while ($function = $req->fetch())
          {
            ?>
              <li>
                <a href="function_edit.php?my_token=<?php echo $user['token']; ?>&function_id=<?php echo $function['id']; ?>"><?php echo $function['title']; ?></a>
                (<a title="Exécuter" href="execute.php?function_id=<?php echo $function['id']; ?>" target="_blank">exécuter</a>)
              </li>
            <?php
          }
          ?>
        </ul>

        <a href="function_new.php?my_token=<?php echo $user['token']; ?>">Nouvelle fonction</a>
      </article>

    </body>
  </html>
