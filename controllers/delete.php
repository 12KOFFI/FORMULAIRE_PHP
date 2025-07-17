<?php
session_start();
require_once("../config/connect_bd.php");

// Vérifier si le matricule est fourni
if (!isset($_GET['matricule'])) {
    header("Location: ../views/Lister.php");
    exit();
}

$matricule = $_GET['matricule'];

try {
    // Commencer une transaction pour garantir l'intégrité
    $connect->beginTransaction();

    // 1. Suppression dans la table correction
    $sql1 = "DELETE FROM correction WHERE matricule = :matricule";
    $stmt1 = $connect->prepare($sql1);
    $stmt1->execute(['matricule' => $matricule]);

    // 2. Suppression dans la table professeur
    $sql2 = "DELETE FROM professeur WHERE matricule = :matricule";
    $stmt2 = $connect->prepare($sql2);
    $stmt2->execute(['matricule' => $matricule]);

    // 3. Suppression dans la table epreuve (si elle existe)
    $sql3 = "DELETE FROM epreuve WHERE id_epreuve IN 
             (SELECT id_epreuve FROM correction WHERE matricule = :matricule)";
    $stmt3 = $connect->prepare($sql3);
    $stmt3->execute(['matricule' => $matricule]);

    // 4. Suppression dans la table examen (si elle existe)
    $sql4 = "DELETE FROM examen WHERE code_examen IN 
             (SELECT code_examen FROM epreuve 
             WHERE id_epreuve IN (SELECT id_epreuve FROM correction WHERE matricule = :matricule))";
    $stmt4 = $connect->prepare($sql4);
    $stmt4->execute(['matricule' => $matricule]);

    // Valider la transaction
    $connect->commit();

    // Redirection après suppression réussie avec HTTP 303 pour éviter la persistance du paramètre
    header("Location: ../views/Lister.php");
    $_SESSION['success'] = 'Donnees supprimees avec succes !';
    exit();

} catch (PDOException $e) {
    // En cas d'erreur, rollback pour annuler toute suppression partielle
    $connect->rollBack();
    echo "Erreur lors de la suppression des données : " . $e->getMessage();
    exit();
}
