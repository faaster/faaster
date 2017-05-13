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

      <table>
        <thead>
          <tr>
            <th>id</th>
            <th>month</th>
            <th>year</th>
            <th>amount</th>
            <th>paid_at</th>
          </tr>
        </thead>

        <?php
        $sql = 'SELECT *
                FROM `users`, `invoices`
                WHERE users.id = invoices.user_id
                  AND users.id = ?';

        $req = $db->prepare($sql);
        $req->execute(array($user['id']));

        while ($invoice = $req->fetch())
        {
          ?>
            <tr>
              <td><?php echo $invoice['id']; ?></td>
              <td><?php echo $invoice['month']; ?></td>
              <td><?php echo $invoice['year']; ?></td>
              <td><?php echo $invoice['amount']; ?></td>
              <td><?php echo $invoice['paid_at']; ?></td>
            </tr>
          <?php
        }
        ?>
      </table>
    </article>
  </body>
</html>
