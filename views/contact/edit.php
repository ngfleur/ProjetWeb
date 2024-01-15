<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Modifier un contact</h1>
    <a href="index.php?page=contact">Retour à la liste des contacts</a>

    <form action="index.php?page=contact&action=edit&id=<?php echo $contact->getId(); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $contact->getNom(); ?>" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo $contact->getPrenom(); ?>" required><br>

        <label for="email">Email :</label>
        <input type="text" id="email" name="email" value="<?php echo $contact->getEmail(); ?>" required><br>

        <label for="num_tel">Numéro de téléphone :</label>
        <input type="text" id="num_tel" name="num_tel" value="<?php echo $contact->getNumTel(); ?>" required><br>

        <label for="id_licencie">Licencié :</label>
        <select class="form-control" id="id_licencie" name="id_licencie" required>
            <?php foreach ($licencies as $licencie) : ?>
                <option value="<?= $licencie->getId() ?>" <?php echo ($licencie->getId() == $contact->getIdLicencie()) ? 'selected' : ''; ?>>
                    <?= $licencie->getNom() ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="action" value="Modifier">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire de modification de contact
    ?>

</body>
</html>
