<?php
require_once("../config/connect_bd.php");

try {
    $sql = "SELECT 
    p.matricule,
    p.nom_prof AS nom_prof, 
    p.prenom_prof AS prenom_prof, 
    p.grade_prof, 
    e.nom_etablissement, 
    e.ville, 
    ex.code_examen, 
    ex.nom_examen, 
    ep.nom_epreuve, 
    ep.type_epreuve, 
    c.date_correction, 
    c.nb_copies 
FROM professeur p 
JOIN etablissement e ON p.code_etablissement = e.code_etablissement 
JOIN correction c ON p.matricule = c.matricule 
JOIN epreuve ep ON c.id_epreuve = ep.id_epreuve 
JOIN examen ex ON ep.code_examen = ex.code_examen 
WHERE p.matricule = (
    SELECT MAX(matricule) FROM professeur
)
ORDER BY c.date_correction DESC;
";

    $stmt = $connect->prepare($sql);
    $stmt->execute();
    
    $professeur = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>
