<?php
// Classe pour gérer la connexion à la base de données
class Database {
    public $host = 'localhost';
    public $db_name = 'gestion_menage';
    public $username = 'root';
    public $password = '';
    public $conn;

    // Méthode pour se connecter à la base de données
    public function connect() {
        $this->conn = null;
        try {
            // Création d'une nouvelle connexion MySQLi
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
            if ($this->conn->connect_error) {
                die("La connexion a échoué: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            echo "Erreur de connexion: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
