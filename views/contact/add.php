<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Ajouter un contact</h1>
    <a href="index.php?page=contact">Retour à la liste des contacts</a>

    <form action="index.php?page=contact&action=add" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="text" id="email" name="email" required><br>

        <label for="num_tel">Numéro de téléphone :</label>
        <input type="text" id="num_tel" name="num_tel" required><br>

        <label for="id_licencie">Licencié :</label>
        <select class="form-control" id="id_licencie" name="id_licencie" required>
            <option value="">Sélectionner un licencié</option>
            <?php foreach ($licencies as $licencie) : ?>
                <option value="<?= $licencie->getId() ?>"><?= $licencie->getNom() ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="action" value="Ajouter">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>
