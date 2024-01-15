<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des catégories</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Liste des categories</h1>
    <a href="index.php?page=categorie&action=add">Ajouter une categorie</a>

    <?php if (count($categories) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Code raccourci</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $categorie): ?>
                    <tr>
                        <td><?php echo $categorie->getNom(); ?></td>
                        <td><?php echo $categorie->getCodeRaccourci(); ?></td>
                        <td>
                            <a href="index.php?page=categorie&action=show&id=<?php echo $categorie->getId(); ?>">Voir</a>
                            <a href="index.php?page=categorie&action=edit&id=<?php echo $categorie->getId(); ?>">Modifier</a>
                            <a href="index.php?page=categorie&action=delete&id=<?php echo $categorie->getId(); ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune categorie trouvé.</p>
    <?php endif; ?>
</body>
</html>

