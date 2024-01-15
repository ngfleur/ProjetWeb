<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des éducateurs</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Liste des éducateurs</h1>
    <a href="index.php?page=educateur&action=add">Ajouter un éducateur</a>

    <?php if (count($educateurs) > 1): ?>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>N° licence</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Catégorie</th>
                        <th>Email</th>
                        <th>Accès admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($educateurs as $educateur): ?>
                            <tr>
                                <td><?= $educateur->getNumLicence() ?></td>
                                <td><?= $educateur->getNom() ?></td>
                                <td><?= $educateur->getPrenom() ?></td>
                                <td><?= $educateur->getIdCategorie() ?></td>
                                <td><?= $educateur->getEmail() ?></td>
                                <td>
                                    <?php if ($educateur->getAdmin()): ?>
                                        <span class="badge bg-success">Oui</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Non</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?page=educateur&action=show&id=<?= $educateur->getId(); ?>">Voir</a>
                                    <a href="index.php?page=educateur&action=edit&id=<?= $educateur->getId(); ?>">Modifier</a>
                                    <a href="index.php?page=educateur&action=delete&id=<?= $educateur->getId(); ?>">Supprimer</a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Aucun éducateur trouvé.</p>
    <?php endif; ?>
</body>
</html>
