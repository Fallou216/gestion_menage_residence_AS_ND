<?php
class Appartement {
    public $conn;
    public $table = 'appartements';

    public $id;
    public $nom;
    public $nom_femme_de_menage;
    public $menage;
    public $type_menage;
    public $date_menage;
    public $prochaine_date_menage;
    public $commentaires;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function creer() {
        $query = "INSERT INTO " . $this->table . " 
                  SET 
                    nom = ?, 
                    nom_femme_de_menage = ?, 
                    menage = ?, 
                    type_menage = ?, 
                    date_menage = ?, 
                    prochaine_date_menage = ?, 
                    commentaires = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssisiss", 
            $this->nom, 
            $this->nom_femme_de_menage, 
            $this->menage, 
            $this->type_menage, 
            $this->date_menage, 
            $this->prochaine_date_menage, 
            $this->commentaires
        );
        return $stmt->execute();
    }

    public function obtenirTous() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    public function obtenirUn() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function mettreAJour() {
        $query = "UPDATE " . $this->table . " 
                  SET 
                    nom = ?, 
                    nom_femme_de_menage = ?, 
                    menage = ?, 
                    type_menage = ?, 
                    date_menage = ?, 
                    prochaine_date_menage = ?, 
                    commentaires = ? 
                  WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssisissi", 
            $this->nom, 
            $this->nom_femme_de_menage, 
            $this->menage, 
            $this->type_menage, 
            $this->date_menage, 
            $this->prochaine_date_menage, 
            $this->commentaires,
            $this->id
        );
        return $stmt->execute();
    }

    public function supprimer() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}
?>
