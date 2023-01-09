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

if ($beer_fermentation == null) {
  header('Location: /admin/fermentation/index.php');
  die;
}

$view['beer_fermentation'] = $beer_fermentation;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Modifier {$beer_fermentation->name}";

// Load view
$actionView = "admin/fermentation/show.php";

// Load layout
include_once 'views/layouts/default.php';
