<form action="index.php?module=user&action=insert" method="post">
        <label>
            Nom
            <input type="text" name="name" required>
        </label>
        <label>
            Nom d'utilisateur
            <input type="email" name="userName" required>
        </label>
        <label>
            Mot de passe
            <input type="password" name="password" required>
        </label>
        <label>
            Date de naissance
            <input type="date" name="birthday">
        </label>
        <input type="submit">
        <div class="container">
            <span><a href="index.php?module=user&action=login" class="login">Déjà un Compte?</a></span>
        </div>
</form>

 