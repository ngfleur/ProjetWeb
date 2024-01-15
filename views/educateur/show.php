<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails de l'éducateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Détails de l'éducateur</h1>
    <a href="index.php?page=educateur">Retour à la liste des éducateurs</a>

    <?php if ($educateur): ?>
        <ul>
            <li><strong>Numéro de licence:</strong> <?php echo $educateur->getNumLicence(); ?></li>
            <li><strong>Nom:</strong> <?php echo $educateur->getNom(); ?></li>
            <li><strong>Prénom:</strong> <?php echo $educateur->getPrenom(); ?></li>
            <li><strong>Catégorie:</strong> <?php echo $educateur->getIdCategorie(); ?></li>
            <li><strong>Email:</strong> <?php echo $educateur->getEmail(); ?></li>
            <li><strong>Accès admin:</strong> <?php echo $educateur->getAdmin() ? 'Oui' : 'Non'; ?></li>
        </ul>
    <?php else: ?>
        <p>L'éducateur n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>
