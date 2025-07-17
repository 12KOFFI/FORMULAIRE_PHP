<?php
session_start();
include_once("../controllers/recupList.php");
include_once("../include/header.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informations Professeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">Informations Professeur</h1>
            </div>
        </div>

        <?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <?php echo $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>


        <?php if ($professeur): ?>
            <div class="row">
                <!-- Informations personnelles -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="mb-0">Informations Personnelles</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Nom:</strong></div>
                                <div class="col-md-8"><?php echo htmlspecialchars($professeur['nom_prof']); ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Prénom:</strong></div>
                                <div class="col-md-8"><?php echo htmlspecialchars($professeur['prenom_prof']); ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Grade:</strong></div>
                                <div class="col-md-8"><?php echo htmlspecialchars($professeur['grade_prof']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Informations établissement -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="mb-0">Établissement</h3>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Nom:</strong></div>
                                <div class="col-md-8"><?php echo htmlspecialchars($professeur['nom_etablissement']); ?></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4"><strong>Ville:</strong></div>
                                <div class="col-md-8"><?php echo htmlspecialchars($professeur['ville']); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informations examen -->
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="mb-0">Examen et Correction</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Code Examen:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['code_examen']); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Nom Examen:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['nom_examen']); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Nom Épreuve:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['nom_epreuve']); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Type Épreuve:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['type_epreuve']); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Date Correction:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['date_correction']); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3"><strong>Nombre de Copies:</strong></div>
                        <div class="col-md-9"><?php echo htmlspecialchars($professeur['nb_copies']); ?></div>
                    </div>
                </div>
            </div>

            <!-- Boutons Modifier et Supprimer -->
            <div class="d-flex justify-content-end gap-3 mb-5">
                <a href="../views/form_update.php?matricule=<?php echo urlencode($professeur['matricule']); ?>" class="btn btn-outline-primary">
                    <i class="bi bi-pencil-square"></i> Modifier
                </a>
                <a href="../controllers/delete.php?matricule=<?php echo urlencode($professeur['matricule']); ?>" class="btn btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette fiche ?');">
                    <i class="bi bi-trash"></i> Supprimer
                </a>
            </div>

        <?php else: ?>
            <div class="alert alert-warning">
                Aucun professeur trouvé avec ce matricule.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
