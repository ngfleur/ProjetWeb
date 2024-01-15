<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Supprimer un contact</h1>
    <a href="index.php?page=contact">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <p>Voulez-vous vraiment supprimer le contact "<?php echo $contact->getNom(); ?> <?php echo $contact->getPrenom(); ?>" ?</p>
        <form action="index.php?page=contact&action=delete&id=<?php echo $contact->getId(); ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>
