<h2>Les type de verres</h2>
<table border="4">
  <tr>
    <td><strong>Nom</strong></td>
    <td><strong>Modifier</strong></td>
    <td><strong>Supprimer</strong></td>
</tr>
  <tbody>
    <?php foreach ($view['beer_glasses'] as $beer_glass) : ?>
      <tr>
        <td><?= $beer_glass->name ?></td>
        <td><a href="/admin/glasses/show.php?id=<?= $beer_glass->id ?>">Modifier</a></td>
        <td><a href="/admin/glasses/destroy.php?id=<?= $beer_glass->id ?>">Supprimer</a></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<a href="/admin/glasses/new.php">Ajouter un type.</a>
</ul>
