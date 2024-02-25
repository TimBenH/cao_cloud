<?php

class NUF_model {
    private $db;

    public function __construct() {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=tai;charset=utf8', 'root', '');
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            die("An error happened during the connection to the database: " . $e->getMessage());
        }
    }

    public function numNewFile($projetSelectionne) {
        $query = $this->db->prepare("SELECT COUNT(*) as row_count FROM fichier WHERE id_projet = '$projetSelectionne'");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['row_count'];
    }

    public function saveFile($nom, $date, $id, $id_projet, $id_precedent, $data, $commentaire) {
        // Préparation de la requête SQL d'insertion
        $stmt = $this->db->prepare("INSERT INTO fichier (nom, date,id, id_projet, id_precedent, data, description) VALUES (?, ?, ?, ?, ?, ?, ?)");

        // Exécution de la requête avec les valeurs fournies
        $stmt->execute([$nom, $date, $id, $id_projet, $id_precedent, $data, $commentaire]);
    }
}

?>
