<?php if (!empty($_SESSION['alert'])) : ?>
  <?php foreach ($_SESSION['alert'] as $alert) : ?>
    <div class="alert alert-<?= $alert['type'] ?>">
      <?= $alert['message'] ?>
    </div>
  <?php endforeach ?>
<?php endif ?>

<?php
flashDestroy()
?>
