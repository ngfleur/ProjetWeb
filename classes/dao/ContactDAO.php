<?php
class ContactDAO {
    private $connexion;

    public function __construct(Connexion $connexion) {
        $this->connexion = $connexion;
    }

    // MÃ©thode pour insÃ©rer un nouveau contact dans la base de donnÃ©es
    public function create(ContactModel $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("INSERT INTO contact (num_tel, num_licence, nom, prenom, email) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$contact->getNumTel(),$contact->getNumLicence(),$contact->getNom(), $contact->getPrenom(), $contact->getEmail()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs d'insertion ici
            return false;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer un contact par son ID
    public function getByNumTel($num_tel) {
        try {
            $stmt = $this->connexion->pdo->prepare("SELECT * FROM contact WHERE num_tel = ?");
            $stmt->execute([$num_tel]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                return new ContactModel($row['num_tel'], $row['num_licence'], $row['nom'], $row['prenom'], $row['email']);
            } else {
                return null; // Aucun contact trouvÃ© avec cet ID
            }
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return null;
        }
    }

    // MÃ©thode pour rÃ©cupÃ©rer la liste de tous les contacts
    public function getAll() {
        try {
            $stmt = $this->connexion->pdo->query("SELECT * FROM contact");
            $contacts = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $contacts[] = new ContactModel($row['num_tel'], $row['num_licence'], $row['nom'], $row['prenom'], $row['email']);
            }

            return $contacts;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de rÃ©cupÃ©ration ici
            return [];
        }
    }

    // MÃ©thode pour mettre Ã  jour un contact
    public function update(ContactModel $contact) {
        try {
            $stmt = $this->connexion->pdo->prepare("UPDATE contact SET  num_licence = ?, nom = ?, prenom = ?, email = ? WHERE num_tel = ?");
            $stmt->execute([$contact->getNumLicence(),$contact->getNom(), $contact->getPrenom(), $contact->getEmail(), $contact->getNumTel()]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de mise Ã  jour ici
            return false;
        }
    }

    // MÃ©thode pour supprimer un contact par son ID
    public function deleteById($num_tel) {
        try {
            $stmt = $this->connexion->pdo->prepare("DELETE FROM contact WHERE num_tel = ?");
            $stmt->execute([$num_tel]);
            return true;
        } catch (PDOException $e) {
            // GÃ©rer les erreurs de suppression ici
            return false;
        }
    }
}
?>
