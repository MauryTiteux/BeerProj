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

$id = $_GET['id'];
$beer_fermentation = BeerFermentation::find($id);

if ($beer_fermentation == null) {
  header('Location: /admin/fermentation/index.php');
  die;
}

$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $beer_fermentation->$f = $_POST["beer_fermentation_{$f}"];
}

if ($beer_fermentation->isValid()) {
  $beer_fermentation->save();
  flashAdd('success', "La fermentation a été modifiée.");
} else {
  foreach ($beer_fermentation->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/fermentation/index.php');
die;
