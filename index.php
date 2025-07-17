<?php
require_once 'include/header.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Système de Gestion des Fiches de Correction</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #f8f9fa;
    }

    .hero-section {
      background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
      color: white;
      padding: 6rem 0;
      border-radius: 0 0 2rem 2rem;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .hero-section p {
      font-size: 1.25rem;
    }

    .feature-card {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
      text-align: center;
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    .feature-icon.text-primary { color: #0d6efd; }
    .feature-icon.text-success { color: #198754; }
    .feature-icon.text-warning { color: #ffc107; }

    .btn-primary {
      padding: 0.75rem 2rem;
      font-size: 1rem;
      font-weight: 500;
    }

    h3 {
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="hero-section text-center">
    <div class="container">
      <h1>Bienvenue sur le Système de Gestion des Fiches de Correction</h1>
      <p class="lead mb-4">Une solution intuitive pour gérer efficacement les corrections d’examens</p>
      <a href="views/form_ajout.php" class="btn btn-light text-primary fw-bold shadow-sm">
        <i class="fas fa-plus-circle me-2"></i>Commencer maintenant
      </a>
    </div>
  </div>

  <div class="container py-5">
    <div class="row g-4">
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon text-primary">
            <i class="fas fa-file-alt"></i>
          </div>
          <h3>Gestion des Fiches</h3>
          <p>Créez, modifiez et suivez toutes vos fiches de correction d'examen de manière organisée.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon text-warning">
            <i class="fas fa-calendar-day"></i>
          </div>
          <h3>Suivi des Dates</h3>
          <p>Planifiez et contrôlez les dates de correction avec clarté et efficacité.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="feature-card">
          <div class="feature-icon text-success">
            <i class="fas fa-shield-alt"></i>
          </div>
          <h3>Sécurité</h3>
          <p>Vos données sont protégées grâce à des mesures de sécurité renforcées.</p>
        </div>
      </div>
    </div>
  </div>

  <?php require_once 'include/footer.php'; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
