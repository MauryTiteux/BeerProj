<h1>Belgian's Beers</h1>
<ul>
  <li><a href="/">Accueil</a></li>
  <?php if (!currentUser()) : ?>
    <li><a href="/sessions/new.php">Se connecter</a></li>
    <li><a href="/users/new.php">S'inscire</a></li>
  <?php else : ?>
    <li>Connecté en tant que <?= currentUser()->username ?></li>
    <?php if (currentUserIsAdmin()) : ?>
      <li><a href="/admin/beers/index.php">Gérer les bières</a></li>
      <li><a href="/admin/glasses/index.php">Gérer les types de verre</a></li>
    <?php endif ?>
    <li><a href="/sessions/destroy.php">Deconnecter</a></li>
  <?php endif ?>
</ul>
