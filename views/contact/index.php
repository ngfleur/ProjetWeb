<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Liste des contacts</h1>
    <a href="index.php?page=contact&action=add">Ajouter un contact</a>

    <?php if (count($contacts) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Numéro de téléphone</th>
                    <th>Licencié</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact): ?>
                    <tr>
                        <td><?php echo $contact->getNom(); ?></td>
                        <td><?php echo $contact->getPrenom(); ?></td>
                        <td><?php echo $contact->getEmail(); ?></td>
                        <td><?php echo $contact->getNumTel(); ?></td>
                        <td><?php echo $contact->getIdLicencie(); ?></td>
                        <td>
                            <a href="index.php?page=contact&action=show&id=<?php echo $contact->getId(); ?>">Voir</a>
                            <a href="index.php?page=contact&action=edit&id=<?php echo $contact->getId(); ?>">Modifier</a>
                            <a href="index.php?page=contact&action=delete&id=<?php echo $contact->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun contact trouvé.</p>
    <?php endif; ?>
</body>
</html>
