<?php
  // Dependencies
  // ===========================================================================

  require_once 'models/bootstrap.php';
  require_once 'helpers/bootstrap.php';

  // Authorizations
  // ===========================================================================

  actionRequireMethodPost();
  actionRequireAdmin();

  // Manage Logic
  // ===========================================================================

  $beer = new Beer();
  $view['form_fields'] = ["name", "description", "alcool", "ibu", "ebc", "style_id", "format_id", "type_verre_id", "brasserie_id", "categorie_id"];

  foreach($view['form_fields'] as $f) {
    $beer->$f = $_POST["beer_{$f}"];
  }

  if($beer->isValid()) {
    $beer->create();
    flashAdd('success', "La bière a été ajoutée.");
  } else {
    foreach($beer->errors as $error) {
      flashAdd('error', $error[key($error)]);
    }
  }
  header('Location: /admin/beers/index.php');
  die;
