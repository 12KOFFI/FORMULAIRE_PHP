

<?php
session_start();
require_once("../config/connect_bd.php");
try {
    // Récupérer les données du formulaire
    $nom_prof = $_POST['nom_prof'];
    $prenom_prof = $_POST['prenom_prof'];
    $grade_prof = $_POST['grade_prof'];
    $nom_etablissement = $_POST['nom_etablissement'];
    $ville = $_POST['ville'];
    $matricule = $_POST['matricule'];
    $code_examen = $_POST['code_examen'];
    $nom_examen = $_POST['nom_examen'];
    $nom_epreuve = $_POST['nom_epreuve'];
    $type_epreuve = $_POST['type_epreuve'];
    $date_correction = $_POST['date_correction'];
    $nb_copies = $_POST['nb_copies'];

    // 1. Mise à jour de la table professeur
    $sql1 = "UPDATE professeur SET 
                nom_prof = :nom_prof,
                prenom_prof = :prenom_prof,
                grade_prof = :grade_prof
             WHERE matricule = :matricule";
    $stmt1 = $connect->prepare($sql1);
    $stmt1->execute([
        'nom_prof' => $nom_prof,
        'prenom_prof' => $prenom_prof,
        'grade_prof' => $grade_prof,
        'matricule' => $matricule
    ]);

    // 2. Mise à jour de la table etablissement (à partir du matricule)
    $sql2 = "UPDATE etablissement 
             JOIN professeur ON etablissement.code_etablissement = professeur.code_etablissement
             SET nom_etablissement = :nom_etablissement,
                 ville = :ville
             WHERE professeur.matricule = :matricule";
    $stmt2 = $connect->prepare($sql2);
    $stmt2->execute([
        'nom_etablissement' => $nom_etablissement,
        'ville' => $ville,
        'matricule' => $matricule
    ]);

    // 3. Mise à jour de la table correction
    $sql3 = "UPDATE correction 
             SET date_correction = :date_correction,
                 nb_copies = :nb_copies
             WHERE matricule = :matricule";
    $stmt3 = $connect->prepare($sql3);
    $stmt3->execute([
        'date_correction' => $date_correction,
        'nb_copies' => $nb_copies,
        'matricule' => $matricule
    ]);

    // 4. Mise à jour de la table epreuve (avec sous-requête)
    $sql4 = "UPDATE epreuve 
             JOIN correction ON correction.id_epreuve = epreuve.id_epreuve
             SET nom_epreuve = :nom_epreuve,
                 type_epreuve = :type_epreuve
             WHERE correction.matricule = :matricule";
    $stmt4 = $connect->prepare($sql4);
    $stmt4->execute([
        'nom_epreuve' => $nom_epreuve,
        'type_epreuve' => $type_epreuve,
        'matricule' => $matricule
    ]);

    // 5. Mise à jour de la table examen
    $sql5 = "UPDATE examen 
             JOIN epreuve ON examen.code_examen = epreuve.code_examen
             JOIN correction ON correction.id_epreuve = epreuve.id_epreuve
             SET nom_examen = :nom_examen
             WHERE correction.matricule = :matricule";
    $stmt5 = $connect->prepare($sql5);
    $stmt5->execute([
        'nom_examen' => $nom_examen,
        'matricule' => $matricule
    ]);

    // Redirection après succès avec HTTP 303 pour éviter la persistance du paramètre
    header("Location: ../views/Lister.php");
    $_SESSION['success'] = 'Donnees modifiees avec succes !';
    exit();

} catch (PDOException $e) {
    echo "Erreur lors de la modification des données : " . $e->getMessage();
}
?>
