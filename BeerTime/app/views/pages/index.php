<h2>Les bières</h2>
<ul>
<?php foreach ($view['beers'] as $beer): ?>
  <li><strong><?= $beer['NomBie'] ?>: <?= $beer['PresentationBie'] ?></strong></li>
<?php endforeach ?>
</ul>

<?php if(currentUser()): ?>
  <h2>Bieres bue par <?= currentUser()['Pseudo'] ?></h2>
  <?php foreach ($view['beersOfUser'] as $beer): ?>
    <li><strong>A bu <?= $beer['NombresBue'] ?> fois la <?= $beer['info']['NomBie'] ?>: <?= $beer['info']['PresentationBie'] ?> et a pensé que c'était une: <?= $beer['Commentaire'] ?></strong></li>
  <?php endforeach ?>
<?php endif ?>
