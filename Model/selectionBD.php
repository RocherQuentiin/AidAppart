<?php
require_once 'ConnexionBD.php';

class SelectionBD extends ConnexionBD {

    public function selectPersonne() {
        $stmt = $this->pdo->query("SELECT * FROM Personne");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectMessagerie() {
        $stmt = $this->pdo->query("SELECT * FROM Messagerie");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectLogement() {
        $stmt = $this->pdo->query("SELECT * FROM Logement");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAdresse() {
        $stmt = $this->pdo->query("SELECT * FROM Adresse");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectMaison() {
        $stmt = $this->pdo->query("SELECT * FROM Maison");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAppartement() {
        $stmt = $this->pdo->query("SELECT * FROM Appartement");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAvis() {
        $stmt = $this->pdo->query("SELECT * FROM Avis");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectAnnonce() {
        $stmt = $this->pdo->query("SELECT * FROM Annonce");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectFavorisSignalement() {
        $stmt = $this->pdo->query("SELECT * FROM Favoris_Signalement");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectCandidature() {
        $stmt = $this->pdo->query("SELECT * FROM Candidature");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectGarent() {
        $stmt = $this->pdo->query("SELECT * FROM Garent");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>