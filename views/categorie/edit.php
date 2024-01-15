<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
    <h1>Modifier une catégorie</h1>
    <a href="index.php?page=categorie">Retour à la liste des catégories</a>

    <form action="index.php?page=categorie&action=edit&id=<?php echo $categorie->getId(); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"  value="<?php echo $categorie->getNom(); ?>" required><br>

        <label for="code_raccourci">Code raccourci :</label>
        <input type="text" id="code_raccourci" name="code_raccourci"  value="<?php echo $categorie->getCodeRaccourci(); ?>" required><br>

        <input type="submit" name="action" value="Modifier">
    </form>

    <?php
    // Inclure ici la logique pour traiter le formulaire d'ajout de contact
    ?>

</body>
</html>

