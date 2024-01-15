<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un éducateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Ajouter un éducateur</h1>
    <a href="index.php?page=educateur">Retour à la liste des éducateurs</a>

    <form action="index.php?page=educateur&action=add" method="post">
        <label for="num_licence">Numéro de licence :</label>
        <input type="text" id="num_licence" name="num_licence" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="id_categorie">Catégorie :</label>
        <select id="id_categorie" name="id_categorie" required>
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <?php if ($categorie->getId() != 1): ?>
                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br>

        <label for="admin">Accès admin :</label>
        <input type="checkbox" id="admin" name="admin"><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout d'éducateur
    ?>

</body>
</html>
