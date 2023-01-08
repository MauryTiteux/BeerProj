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
$beer_glass = BeerGlass::find($id);

if ($beer_glass == null) {
  header('Location: /admin/glasses/index.php');
  die;
}

$view['form_fields'] = ["name"];

foreach ($view['form_fields'] as $f) {
  $beer_glass->$f = $_POST["beer_glass_{$f}"];
}

if ($beer_glass->isValid()) {
  $beer_glass->save();
  flashAdd('success', "Le format a été modifié.");
} else {
  foreach ($beer_glass->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}
header('Location: /admin/glasses/index.php');
die;
