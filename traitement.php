<?php


// Fonction pour nettoyer les données
function nettoyer($data) {
    return htmlspecialchars(trim($data));
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    // Récupérer et nettoyer les données
    $nom_prof = nettoyer($_POST['nom_prof'] );
    $prenom_prof = nettoyer($_POST['prenom_prof']);
    $nom_etablissement = nettoyer($_POST['nom_etablissement']);
    $ville = nettoyer($_POST['ville']);
    $code_examen = nettoyer($_POST['code_examen']);
    $nom_examen = nettoyer($_POST['nom_examen']);
    $nom_epreuve = nettoyer($_POST['nom_epreuve']);
    $dates_correction = nettoyer($_POST['dates_correction']);
    $nb_copies = nettoyer($_POST['nb_copies']);
    $grade_prof = nettoyer($_POST['grade_prof']);
    $type_epreuve = nettoyer($_POST['type_epreuve']);

    // Vérification des champs
    if (empty($nom_prof) || empty($prenom_prof) || empty($nom_etablissement) || empty($ville) || 
        empty($code_examen) || empty($nom_examen) || empty($nom_epreuve) || 
        empty($dates_correction) || empty($nb_copies) || empty($grade_prof) || 
        empty($type_epreuve)) {
        echo  "Veuillez remplir tous les champs";
    }

    else{
        // Exécuter l'insertion
        require_once('insertion.php');
        
        // Rediriger vers la page index.php avec un message de succès
        header('Location: index.php?success=1'); // rediriger vers la page index.php avec un message de succès
        exit();
    }



}