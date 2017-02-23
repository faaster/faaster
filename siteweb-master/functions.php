  <?php

  require_once '_include/authenticate-user.php';

  ?>

  <!DOCTYPE html>

  <html>
    <head>
      <meta charset="utf-8" />
      <title>FaaSter</title>
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

          <li><a href="function_edit.php?my_token=<?php echo $user['token']; ?>&function_id=<?php echo $function['id']; ?>"><?php echo $function['title']; ?></a></li>


                      <?php
                    }
          ?>

          <li><a href="function_edit.php?my_token=<?php echo $user['token']; ?>&function_id=1">Ma fonction</a></li>
          <li><a href="function_edit.php?my_token=<?php echo $user['token']; ?>&function_id=2">Autre test</a></li>
          <li><a href="function_edit.php?my_token=<?php echo $user['token']; ?>&function_id=3">Opération (test)</a></li>
        </ul>

        <a href="function_new.php?my_token=<?php echo $user['token']; ?>">Nouvelle fonction</a>
      </article>

    </body>
  </html>
