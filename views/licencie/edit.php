<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Modifier un licencié</h1>
    <a href="index.php?page=licencie">Retour à la liste des licenciés</a>

    <form action="index.php?page=licencie&action=edit&id=<?php echo $licencie->getId(); ?>" method="post">
        <label for="num_licence">Numéro de licence :</label>
        <input type="text" id="num_licence" name="num_licence" value="<?php echo $licencie->getNumLicence(); ?>" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $licencie->getNom(); ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $licencie->getPrenom(); ?>" required><br>

        <label for="id_categorie">Catégorie :</label>
        <select class="form-control" id="id_categorie" name="id_categorie" required>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie->getId() ?>" <?php echo ($categorie->getId() == $licencie->getIdCategorie()) ? 'selected' : ''; ?>>
                    <?= $categorie->getNom() ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="action" value="Modifier">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire de modification de licencié
    ?>

</body>
</html>
