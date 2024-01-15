<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un licencié</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Supprimer un licencié</h1>
    <a href="index.php?page=licencie">Retour à la liste des licenciés</a>

    <?php if ($licencie): ?>
        <p>Voulez-vous vraiment supprimer le licencié "<?php echo $licencie->getNom(); ?> <?php echo $licencie->getPrenom(); ?>" ?</p>
        <form action="index.php?page=licencie&action=delete&id=<?php echo $licencie->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>Le licencié n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>
