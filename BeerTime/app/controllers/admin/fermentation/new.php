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

$beer_glass = new BeerFermentation();

$view['beer_fermentation'] = $beer_fermentation;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter une fermentation";

// Load view
$actionView = "admin/fermentation/new.php";

// Load layout
include_once 'views/layouts/default.php';
