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
$beer_glass = BeerGlass::find($id);

if ($beer_glass) {
  $beer_glass->delete();
  flashAdd('success', "Le format a été supprimée.");
}

header('Location: /admin/glasses/index.php');
die;
