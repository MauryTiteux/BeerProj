<h2>Les bières</h2>
<table border="4">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Description</strong></td>
    <td><strong>Alcool</strong></td>
    <td><strong>Type verre</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['beers'] as $beer) : ?>
      <tr>
        <td><?= $beer->name ?></td>
        <td><?= $beer->description ?></td>
        <td><?= $beer->alcool ?></td>
        <td><?= $beer->getGlass() ?></td>
        <td><a href="/admin/beers/show.php?id=<?= $beer->id ?>">Modifier</a></td>
        <td><a href="/admin/beers/destroy.php?id=<?= $beer->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href="/admin/beers/new.php">Ajouter une bière.</a>
</ul>
