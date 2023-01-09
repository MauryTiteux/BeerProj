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

$beer_fermentation = new BeerFermentation();
$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $beer_fermentation->$f = $_POST["beer_fermentation_{$f}"];
}

if ($beer_fermentation->isValid()) {
  $beer_fermentation->create();
  flashAdd('success', "Le type de fermentation a été ajouté..");
} else {
  foreach ($beer_fermentation->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/fermentation/index.php');
die;
