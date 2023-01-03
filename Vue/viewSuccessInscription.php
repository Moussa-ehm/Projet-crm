<?php ob_start(); ?>

<p>Inscription réussie</p>
<?php $contenu = ob_get_clean(); ?>

<?php require_once 'viewGabarit.php'; ?>