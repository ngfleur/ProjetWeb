<?php
class CategorieDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer une nouvelle categorie dans la base de donnÃ©es
    public function create(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO categorie (code_raccourci, nom) VALUES (?, ?)");
            $stmt->execute([$categorie->getCodeRaccourci(), $categorie->getNom()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer une categorie par son ID
    public function getByCodeRaccourci($code_raccourci) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM categorie WHERE code_raccourci = ?");
            $stmt->execute([$code_raccourci]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new CategorieModel($row['code_raccourci'], $row['nom']);
            } else {
                return null; // Aucune categorie trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les licenciés
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM categorie");
            $categories = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categories[] = new CategorieModel($row['code_raccourci'], $row['nom']);
            }

            return $categories;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour une categorie
    public function update(CategorieModel $categorie) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE categorie SET nom = ?, code_raccourci = ? WHERE code_raccourci = ?");
            $stmt->execute([$categorie->getNom(), $categorie->getCodeRaccourci(), $categorie->getCodeRaccourci()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer une categorie par son ID
    public function deleteByCodeRaccourci($code_raccourci) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM categorie WHERE code_raccourci = ?");
            $stmt->execute([$code_raccourci]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
