<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un éducateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Modifier un éducateur</h1>
    <a href="index.php?page=educateur">Retour à la liste des éducateurs</a>

    <form action="index.php?page=educateur&action=edit&id=<?= $educateur->getId(); ?>" method="post">
        <label for="num_licence">Numéro de licence :</label>
        <input type="text" id="num_licence" name="num_licence" value="<?= $educateur->getNumLicence(); ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= $educateur->getNom(); ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= $educateur->getPrenom(); ?>" required><br>

        <label for="id_categorie">Catégorie :</label>
        <select id="id_categorie" name="id_categorie" required>
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <?php if ($categorie->getId() != 1): ?>
                    <option value="<?= $categorie->getId() ?>" <?php if ($categorie->getId() == $educateur->getIdCategorie()) echo "selected"; ?>>
                        <?= $categorie->getNom() ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="<?= $educateur->getEmail(); ?>" required><br>

        <label for="mdp">Nouveau mot de passe :</label>
        <input type="password" id="mdp" name="mdp"><br>

        <label for="admin">Accès admin :</label>
        <input type="checkbox" id="admin" name="admin" <?php if ($educateur->getAdmin()) echo "checked"; ?>><br>

        <input type="submit" name="action" value="Modifier">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire de modification d'éducateur
    ?>

</body>
</html>
