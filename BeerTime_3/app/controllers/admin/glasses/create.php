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

  $beer_glass = new BeerGlass();
  $view['form_fields'] = ["name"];

  foreach($view['form_fields'] as $f) {
    $beer_glass->$f = $_POST["beer_glass_{$f}"];
  }

  if($beer_glass->isValid()) {
    $beer_glass->create();
    flashAdd('success', "Le format a été ajouté..");
  } else {
    foreach($beer_glass->errors as $error) {
      flashAdd('error', $error[key($error)]);
    }
  }
  header('Location: /admin/glasses/index.php');
  die;
