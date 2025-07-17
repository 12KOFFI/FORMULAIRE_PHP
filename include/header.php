<?php
// Définir le chemin de base visible par le navigateur
$base_url = '/FORMULAIRE_PHP'; // adapte selon ton projet
?>

<nav class="navbar navbar-expand-lg bg-white shadow-sm fs-4">
  <div class="container">
    <a class="navbar-brand fs-2 text-primary fw-bold" href="<?php echo $base_url; ?>/index.php">Fiches de Correction</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link text-primary fw-semibold" href="<?php echo $base_url; ?>/views/form_ajout.php">Ajouter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-primary fw-semibold" href="<?php echo $base_url; ?>/views/Lister.php">Lister</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
