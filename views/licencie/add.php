<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Ajouter un licencié</h1>
    <a href="index.php?page=licencie">Retour à la liste des licenciés</a>

    <form action="index.php?page=licencie&action=add" method="post">
        <label for="num_licence">Numéro de licence :</label>
        <input type="text" id="num_licence" name="num_licence" required><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="id_categorie">Catégorie :</label>
        <select class="form-control" id="id_categorie" name="id_categorie" required>
            <option value="">Sélectionner une catégorie</option>
            <?php foreach ($categories as $categorie) : ?>
                <?php if ($categorie->getId() != 1) : ?>
                    <option value="<?= $categorie->getId() ?>"><?= $categorie->getNom() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de licencié
    ?>

</body>
</html>
