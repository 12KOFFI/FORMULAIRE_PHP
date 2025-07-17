<?php
include_once("../controllers/recupList.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche de Correction</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .strike {
            text-decoration: line-through;
            opacity: 0.5;
        }

        label.form-check-label:hover {
            cursor: pointer;
            opacity: 0.8;
        }

        .submit-section {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container py-5">

        <div class="row justify-content-center">
                <div class="form-container">
                    <div class="form-header">
                        <h2 class="fw-bold text-primary"> Modifier les informations de la fiche de correction</h2>
                    </div>
                    <form action="../controllers/update.php" method="post">

                    <!-- Champ caché pour conserver le matricule (clé primaire) -->
                    <input type="hidden" name="matricule" value="<?= $professeur['matricule'] ?>">
                        <!-- Infos Professeur -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom du professeur</label>
                                <input type="text" class="form-control" id="nom" name="nom_prof" value="<?= $professeur['nom_prof'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom du professeur</label>
                                <input type="text" class="form-control" id="prenom" name="prenom_prof" value="<?= $professeur['prenom_prof'] ?>" required>
                            </div>
                        </div>

                        <!-- Grade -->
                        <div class="mb-3">
                            <label class="form-label">Grade</label>
                            <div class="d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="grade_prof" id="vip" value="VIP" <?php if ($professeur['grade_prof'] == 'VIP') echo 'checked'; ?> required>
                                    <label class="form-check-label" for="vip">VIP</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="grade_prof" id="maitre" value="Maitre" <?php if ($professeur['grade_prof'] == 'Maitre') echo 'checked'; ?>>
                                    <label class="form-check-label" for="maitre">Maître</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="grade_prof" id="assistant" value="Assistant">
                                    <label class="form-check-label" for="assistant">Assistant</label>
                                </div>
                            </div>
                        </div>

                        <!-- Etablissement -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="etablissement" class="form-label">Nom établissement</label>
                                <input type="text" class="form-control" id="etablissement" name="nom_etablissement" value="<?= $professeur['nom_etablissement'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="ville" class="form-label">Ville établissement</label>
                                <input type="text" class="form-control" id="ville" name="ville" value="<?= $professeur['ville'] ?>" required>
                            </div>
                        </div>

                        <!-- Examen -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="code_examen" class="form-label">Code examen</label>
                                <select class="form-select" id="code_examen" name="code_examen" value="<?= $professeur['code_examen'] ?>" required>
                                    <option value="">Sélectionnez un examen</option>
                                    <option value="BEP">BEP</option>
                                    <option value="BAC">BAC</option>
                                    <option value="BTS">BTS</option>
                                    <option value="LIC">LIC</option>
                                    <option value="MAS">MAS</option>
                                    <option value="DOC">DOC</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nom_examen" class="form-label">Nom examen</label>
                                <input type="text" class="form-control" id="nom_examen" name="nom_examen" value="<?= $professeur['nom_examen'] ?>" required>
                            </div>
                        </div>

                        <!-- Epreuve -->
                        <div class="mb-3">
                            <label for="nom_epreuve" class="form-label">Nom épreuve</label>
                            <input type="text" class="form-control" id="nom_epreuve" name="nom_epreuve" value="<?= $professeur['nom_epreuve'] ?>" required>
                        </div>

                        <!-- Type épreuve -->
                        <div class="mb-3">
                            <label class="form-label">Type épreuve</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_epreuve" id="ecrit" value="écrit" <?php if ($professeur['type_epreuve'] == 'écrit') echo 'checked'; ?> required>
                                    <label class="form-check-label" for="ecrit">Écrit</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="type_epreuve" id="oral" value="oral" <?php if ($professeur['type_epreuve'] == 'oral') echo 'checked'; ?>>
                                    <label class="form-check-label" for="oral">Oral</label>
                                </div>
                            </div>
                        </div>

                        <!-- Dates et copies -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="date_correction" class="form-label">Date de correction</label>
                                <input type="date" class="form-control" id="date_correction" name="date_correction" value="<?= $professeur['date_correction'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nombre_copies" class="form-label">Nombre de copies</label>
                                <input type="number" class="form-control" id="nombre_copies" name="nb_copies" value="<?= $professeur['nb_copies'] ?>" required>
                            </div>
                        </div>

                        <!-- Bouton -->
                        <div class="submit-section">
                            <button type="button" class="btn btn-primary w-100 btn-lg" id="btnSubmit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Les informations sont-elles correctes ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Oui, envoyer</button>
                </div>
            </div>
        </div>
    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script pour lier les codes d'examen avec leurs noms -->
    <script>
        const examens = {
            'BEP': 'Brevet d\'Études Professionnelles',
            'BAC': 'Baccalauréat',
            'BTS': 'Brevet de Technicien Supérieur',
            'LIC': 'Licence',
            'MAS': 'Master',
            'DOC': 'Doctorat'
        };

        document.addEventListener('DOMContentLoaded', function() {
            const codeExamenSelect = document.getElementById('code_examen');
            const nomExamenInput = document.getElementById('nom_examen');
            const btnSubmit = document.getElementById('btnSubmit');
            const form = document.querySelector('form');
            const modal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            const confirmSubmit = document.getElementById('confirmSubmit');

            codeExamenSelect.addEventListener('change', function() {
                const selectedCode = this.value;
                if (selectedCode) {
                    nomExamenInput.value = examens[selectedCode];
                } else {
                    nomExamenInput.value = '';
                }
            });

            btnSubmit.addEventListener('click', function() {
                modal.show();
            });

            confirmSubmit.addEventListener('click', function() {
                form.submit();
            });
        });
    </script>

    <!-- JS pour barrer option non choisie -->
    <script>
        document.querySelectorAll('input[name="type_epreuve"]').forEach(radio => {
            radio.addEventListener('change', function () {
                const labels = document.querySelectorAll('.form-check-label');
                labels.forEach(label => label.classList.remove('strike'));

                if (this.value === 'ecrit') {
                    document.querySelector('label[for="oral"]').classList.add('strike');
                } else {
                    document.querySelector('label[for="ecrit"]').classList.add('strike');
                }
            });
        });
    </script>
</body>
</html>
