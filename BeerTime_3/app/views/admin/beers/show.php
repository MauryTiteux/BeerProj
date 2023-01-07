<h1>Modifier <?= $view['beer']->name ?></h1>
<form method="post" action="/admin/beers/update.php?id=<?= $view['beer']->id ?>">
  <?php foreach ($view['form_fields'] as $f) : ?>
    <?php if ($f == "type_verre_id") : ?>
      <div>
        <label for="beer_type_verre_id">
          <p>Type de verre:</p>
        </label>
        <select id="beer_type_verre_id" name="beer_type_verre_id">
          <?php foreach (BeerGlass::all() as $glass) : ?>
            <option value="<?= $glass->id ?>" <?= ($glass->id == $view['beer']->type_verre_id) ? "selected" : "" ?>><?= $glass->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    <?php else : ?>
      <div>
        <label for="beer_<?= $f ?>">
          <p><?= $f ?>:</p>
        </label>
        <input type="text" id="beer_<?= $f ?>" name="beer_<?= $f ?>" value="<?= $view['beer']->$f ?>">
      </div>
    <?php endif ?>
  <?php endforeach ?>
  <input type="submit" value="Modifier" />
</form>
<label for="cars">Choose a car:</label>
