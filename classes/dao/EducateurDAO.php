<?php
class EducateurDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau educateur dans la base de donnÃ©es
    public function create(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (num_licence, nom, prenom, code_raccourci ) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getNumLicence(),$educateur->getNom(), $educateur->getPrenom(), $educateur->getCodeRaccourci()]);

            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateur (email, num_licence, mdp, admin) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $educateur->getNumLicence(), $educateur->getMdp(), $educateur->getAdmin()]);
           
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un educateur par son ID
    public function getByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM educateur INNER JOIN licencie ON educateur.num_licence = licencie.num_licence WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel( $row['num_licence'], $row['nom'], $row['prenom'],$row['code_raccourci'], $row['email'], $row['mdp'], $row['admin']);
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
            $stmt = $this->connexion->pdo->query("SELECT * FROM educateur INNER JOIN licencie ON educateur.num_licence = licencie.num_licence ");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] = new EducateurModel($row['num_licence'], $row['nom'], $row['prenom'],$row['code_raccourci'], $row['email'], $row['mdp'], $row['admin']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    
public function update(EducateurModel $educateur) {
    try {
        $stmt = $this->connexion->pdo->prepare("UPDATE licencie SET num_licence = ?, nom = ?, prenom = ?, code_raccourci = ? WHERE num_licence = ?");
        $stmt->execute([$educateur->getNumLicence(), $educateur->getNom(), $educateur->getPrenom(), $educateur->getCodeRaccourci(), $educateur->getNumLicence()]);

        $stmt = $this->connexion->pdo->prepare("UPDATE educateur SET mdp = ?, admin = ? WHERE email = ?");
        $stmt->execute([$educateur->getMdp(), $educateur->getAdmin(), $educateur->getEmail()]);
        
        return true;
    } catch (PDOException $e) {
       // GÃ©rer les erreurs de mise Ã  jour ici
        return false;
    }
}

    // MÃ©thode pour supprimer un educateur par son ID
    public function delete(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateur WHERE email = ?");
            $stmt->execute([$educateur->getEmail()]);

            $stmt = $this->connexion->pdo->prepare("DELETE FROM licencie WHERE num_licence = ?");
            $stmt->execute([$educateur->getNumLicence()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>