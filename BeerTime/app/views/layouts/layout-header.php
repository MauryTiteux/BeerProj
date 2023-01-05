<?php $metaAppTitle = "Belgian's Beers"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $metaPageTitle ? "{$metaAppTitle} - {$metaPageTitle}" : $metaAppTitle ?></title>
    <link rel="stylesheet" href="/assets/stylesheets/styles.css">
  </head>
  <body>
    <h1>Belgian's Beers</h1>
    <ul>
    <li><a href="/">Accueil</a></li>
    <li><a href="/pages/contact.php">Contact</a></li>
    <?php if(!currentUser()): ?>
      <li><a href="/sessions/new.php">Connecter</a></li>
    <?php else: ?>
      <li>Connecté en tant que <?= currentUser()['Pseudo'] ?></li>
      <li><a href="/pages/boire.php?id=1">Boire Jupiler</li>
      <li><a href="/pages/boire.php?id=2">Boire Maes</li>
      <li><a href="/sessions/destroy.php">Deconnecter</a></li>
    <?php endif ?>
    </ul>
