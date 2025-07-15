<?php
require_once("config/connect_bd.php"); // Connexion à la BD

try {
    // Requête 1 : insertion dans etablissement
    $sqlEtab = "INSERT INTO etablissement (nom_etablissement, ville) VALUES (:nom_etablissement, :ville)";
    $insertEtab = $connect->prepare($sqlEtab);
    $insertEtab->execute([
        'nom_etablissement' => $nom_etablissement,
        'ville' => $ville
    ]);
    $code_etablissement = $connect->lastInsertId();

    // Requête 2 : insertion dans professeur
    $sqlProf = "INSERT INTO professeur (nom_prof, prenom_prof, grade_prof, code_etablissement) VALUES (:nom_prof, :prenom_prof, :grade_prof, :code_etablissement)";
    $insertProf = $connect->prepare($sqlProf);
    $insertProf->execute([
        'nom_prof' => $nom_prof,
        'prenom_prof' => $prenom_prof,
        'grade_prof' => $grade_prof,
        'code_etablissement' => $code_etablissement
    ]);
    $matricule = $connect->lastInsertId();

    // Requête 3 : examen
    $sqlExam = "INSERT IGNORE INTO examen (code_examen, nom_examen) VALUES (:code_examen, :nom_examen)";
    $insertExam = $connect->prepare($sqlExam);
    $insertExam->execute([
        'code_examen' => $code_examen,
        'nom_examen' => $nom_examen
    ]);

    // Requête 4 : épreuve
    $sqlEpreuve = "INSERT INTO epreuve (nom_epreuve, type_epreuve, code_examen) VALUES (:nom_epreuve, :type_epreuve, :code_examen)";
    $insertEpreuve = $connect->prepare($sqlEpreuve);
    $insertEpreuve->execute([
        'nom_epreuve' => $nom_epreuve,
        'type_epreuve' => $type_epreuve,
        'code_examen' => $code_examen
    ]);
    $id_epreuve = $connect->lastInsertId();

    // Requête 5 : correction
    $sqlCorr = "INSERT INTO correction (matricule, id_epreuve, date_correction, nb_copies) VALUES (:matricule, :id_epreuve, :date_correction, :nb_copies)";
    $insertCorr = $connect->prepare($sqlCorr);
    $insertCorr->execute([
        'matricule' => $matricule,
        'id_epreuve' => $id_epreuve,
        'date_correction' => $dates_correction,
        'nb_copies' => $nb_copies
    ]);

    echo " Données enregistrées avec succès.";
} catch (PDOException $e) {
    echo "Erreur d'insertion : " . $e->getMessage();
}
?>
