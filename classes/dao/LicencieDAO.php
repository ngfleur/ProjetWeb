<?php
class LicencieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau licencié dans la base de donnÃ©es
    public function create(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (num_licence, nom, prenom, id_categorie) VALUES (?, ?, ?, ?)");
            $stmt->execute([$licencie->getNumLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getIdCategorie()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un licencié par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new LicencieModel($row['id'],$row['num_licence'],$row['nom'], $row['prenom'], $row['id_categorie']);
            } else {
                return null; // Aucun licencié trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les licenciés
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM licencie");
            $licencies = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $licencies[] = new LicencieModel($row['id'],$row['num_licence'],$row['nom'], $row['prenom'], $row['id_categorie']);
            }

            return $licencies;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un licencié
    public function update(LicencieModel $licencie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE licencie SET num_licence = ?, nom = ?, prenom = ?, id_categorie = ? WHERE id = ?");
            $stmt->execute([$licencie->getNumLicence(), $licencie->getNom(), $licencie->getPrenom(), $licencie->getIdCategorie(), $licencie->getId()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencie WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
