<form action="index.php?module=user&action=authentification" method="post"> <!--***OU BIEN ACTION = INDEX -->
  <div class="container">
    <label for="username"><b>Nom d'utilisateur</b></label>
    <input type="email" placeholder="Entez votre nom d'utilisateur" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Mot de passe" name="password" required>

    <input type = "submit" value = "login">
  </div>
  <div class="container">
    <span><a href="index.php?module=user&action=create" class="login">Créer un Compte?</a></span>
  </div>
</form>