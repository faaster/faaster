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
        <li><a href="signup.php">S'inscrire</a></li>
        <li>Connexion</li>
      </ul>
    </nav>

    <hr />

    <article>
      <h2>Connexion à FaaSter</h2>

      <form action="login-post.php" method="post">
        <div>
          <input name="email" type="email" placeholder="Courriel" required>
        </div>

        <div>
          <input name="password" type="password" placeholder="Mot de passe" required>
        </div>

        <div>
          <input class="btn" type="submit" value="Connexion">
        </div>
      </form>
    </article>
  </body>
</html>
