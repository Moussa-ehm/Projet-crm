<?php ob_start(); ?>
  <form method="post" action="../index.php?action=inscription">
             <input type="text" name="name" placeholder="Login" /><br />
             <input type="email" name="email" placeholder="email" /><br />
             <input type="password" name="password" placeholder="Mot de passe" /><br />
             <input type="submit" name="inscription" value="inscription" />
          </form>
<?php $contenu = ob_get_clean(); ?>

<?php require_once 'viewGabarit.php'; ?>