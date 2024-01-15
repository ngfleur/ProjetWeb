<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Détails du contact</h1>
    <a href="index.php?page=contact">Retour à la liste des contacts</a>

    <?php if ($contact): ?>
        <p>Nom : <?php echo $contact->getNom(); ?></p>
        <p>Prénom : <?php echo $contact->getPrenom(); ?></p>
        <p>Email : <?php echo $contact->getEmail(); ?></p>
        <p>Numéro de téléphone : <?php echo $contact->getNumTel(); ?></p>
        <p>Licencié : <?php echo $contact->getIdLicencie(); ?></p>
    <?php else: ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>

</body>
</html>
