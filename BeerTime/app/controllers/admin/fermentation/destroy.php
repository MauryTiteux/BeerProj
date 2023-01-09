<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodGet();
actionRequireAdmin();

// Manage Logic
// ===========================================================================

$id = $_GET['id'];
$beer_fermentation = BeerFermentation::find($id);

if ($beer_fermentation) {
  $beer_fermentation->delete();
  flashAdd('success', "La fermentation a été supprimée.");
}

header('Location: /admin/fermentation/index.php');
die;
