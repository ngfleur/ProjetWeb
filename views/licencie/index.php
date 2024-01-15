<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des licenciés</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Liste des licenciés</h1>
    <a href="index.php?page=licencie&action=add">Ajouter un licencié</a>

    <?php if (count($licencies) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Numéro de licence</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Catégorie</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($licencies as $licencie): ?>
                    <tr>
                        <td><?php echo $licencie->getNumLicence(); ?></td>
                        <td><?php echo $licencie->getNom(); ?></td>
                        <td><?php echo $licencie->getPrenom(); ?></td>
                        <td><?php echo $licencie->getIdCategorie(); ?></td>
                        <td>
                            <a href="index.php?page=licencie&action=show&id=<?php echo $licencie->getId(); ?>">Voir</a>
                            <a href="index.php?page=licencie&action=edit&id=<?php echo $licencie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=licencie&action=delete&id=<?php echo $licencie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun licencié trouvé.</p>
    <?php endif; ?>
</body>
</html>
