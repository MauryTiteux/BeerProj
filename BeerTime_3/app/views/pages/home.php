<h2>Les bières</h2>
<ul>
<?php foreach ($view['beers'] as $beer): ?>
  <li><strong><?= $beer->name ?>: <?= $beer->description ?></strong></li>
<?php endforeach ?>
</ul>
