<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Connexion</h1>

    <form action="index.php?page=login&action=login" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br>

        <input type="submit" value="Se connecter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire de connexion
    ?>

</body>
</html>
