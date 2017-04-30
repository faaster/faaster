<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <title>FaaSter</title>
  </head>

  <body>
    <header>
      <h1>FaaSter</h1>
      <link href="style.css" rel="stylesheet" />
    </header>

    <hr />

    <nav>
      <ul>
        <li>S'inscrire</li>
        <li><a href="login.php">Connexion</a></li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2>S'inscrire à FaaSter</h2>

      <form action="signup-post.php" method="post">
        <div>
          <input name="full_name" type="text" placeholder="Nom complet" required>
        </div>

        <div>
          <input name="email" type="email" placeholder="Courriel" required>
        </div>

        <div>
          <input name="password" type="password" placeholder="Mot de passe" required>
        </div>

        <div>
          <input class="btn" type="submit" value="Créer mon compte">
        </div>
      </form>
    </article>
  </body>
</html>
