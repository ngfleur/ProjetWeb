<?php
class EducateurDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau educateur dans la base de donnÃ©es
    public function create(EducateurModel $educateur) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO licencie (num_licence, nom, prenom, id_categorie ) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getNumLicence(),$educateur->getNom(), $educateur->getPrenom(), $educateur->getIdCategorie()]);

            $lastId = $this->connexion->pdo->lastInsertId();

            $stmt = $this->connexion->pdo->prepare("INSERT INTO educateur (email, id_licencie, mdp, admin) VALUES (?, ?, ?, ?)");
            $stmt->execute([$educateur->getEmail(), $lastId, $educateur->getMdp(), $educateur->getAdmin()]);
           
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            echo $e;
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un educateur par son ID
    public function getById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT educateur.*, licencie.num_licence, licencie.nom, licencie.prenom, licencie.id_categorie  FROM educateur INNER JOIN licencie ON educateur.id_licencie = licencie.id WHERE educateur.id = ?");
            $stmt->execute([$id]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($id, $row['num_licence'], $row['nom'], $row['prenom'],$row['id_categorie'], $row['email'], $row['mdp'], $row['admin'], $row['id_licencie']);
            } else {
                return null; // Aucun educateur trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    public function getByEmail($email) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT educateur.*, licencie.num_licence, licencie.nom, licencie.prenom, licencie.id_categorie  FROM educateur INNER JOIN licencie ON educateur.id_licencie = licencie.id WHERE educateur.email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new EducateurModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'],$row['id_categorie'], $row['email'], $row['mdp'], $row['admin'], $row['id_licencie']);
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
            $stmt = $this->connexion->pdo->query("SELECT educateur.*, licencie.num_licence, licencie.nom, licencie.prenom, licencie.id_categorie  FROM educateur INNER JOIN licencie ON educateur.id_licencie = licencie.id");
            $educateurs = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $educateurs[] =new EducateurModel($row['id'], $row['num_licence'], $row['nom'], $row['prenom'],$row['id_categorie'], $row['email'], $row['mdp'], $row['admin'], $row['id_licencie']);
            }

            return $educateurs;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    
public function update(EducateurModel $educateur) {
    try {
        $stmt = $this->connexion->pdo->prepare("UPDATE licencie SET num_licence = ?, nom = ?, prenom = ?, id_categorie = ? WHERE id = ?");
        $stmt->execute([$educateur->getNumLicence(), $educateur->getNom(), $educateur->getPrenom(), $educateur->getIdCategorie(), $educateur->getIdLicencie()]);

        $stmt = $this->connexion->pdo->prepare("UPDATE educateur SET email = ?, mdp = ?, admin = ? WHERE id = ?");
        $stmt->execute([$educateur->getEmail(), $educateur->getMdp(), $educateur->getAdmin(), $educateur->getId()]);
        
        return true;
    } catch (PDOException $e) {
       // GÃ©rer les erreurs de mise Ã  jour ici
        return false;
    }
}

    // MÃ©thode pour supprimer un educateur par son ID
    public function deleteById($id) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM educateur WHERE id = ?");
            $stmt->execute([$id]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
