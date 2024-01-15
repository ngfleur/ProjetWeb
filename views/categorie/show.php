<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de la catégorie</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
        <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Détails de la catégorie</h1>
    <a href="index.php?page=categorie">Retour à la liste des catégories</a>

    <?php if ($categorie): ?>
        <p><strong>Nom :</strong> <?php echo $categorie->getNom(); ?></p>
        <p><strong>Code raccourci :</strong> <?php echo $categorie->getCodeRaccourci(); ?></p>
    <?php else: ?>
        <p>La catégorie n'a pas été trouvée.</p>
    <?php endif; ?>
</body>
</html>

