<?php
class EducateurDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau educateur dans la base de donnÃ©es
    public function create(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateur (email, num_licence, mdp, admin ) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(),$educateur->getNumLicence(),$educateur->getMdp(), $educateur->getAdmin()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un educateur par son ID
    public function getByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateur WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['email'], $row['num_licence'], $row['mdp'], $row['admin']);
            } else {
                return null; // Aucun educateur trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les educateurs
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateur");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new EducateurModel($row['email'], $row['num_licence'], $row['mdp'], $row['admin']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un educateur
    public function update(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE educateur SET  num_licence = ?, mdp = ?, admin = ? WHERE email = ?");
            $stmt->execute([$educateur->getNumLicence(),$educateur->getMdp(), $educateur->getAdmin(), $educateur->getEmail()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un educateur par son ID
    public function deleteByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateur WHERE email = ?");
            $stmt->execute([$email]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
