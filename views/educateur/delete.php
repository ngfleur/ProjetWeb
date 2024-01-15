<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un éducateur</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Supprimer un éducateur</h1>
    <a href="index.php?page=educateur">Retour à la liste des éducateurs</a>

    <?php if ($educateur): ?>
        <p>Voulez-vous vraiment supprimer l'éducateur "<?php echo $educateur->getNom(); ?> <?php echo $educateur->getPrenom(); ?>" ?</p>
        <form action="index.php?page=educateur&action=delete&id=<?php echo $educateur->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>L'éducateur n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>
