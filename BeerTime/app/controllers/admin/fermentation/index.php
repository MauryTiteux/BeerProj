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

$view['beer_fermentation'] = BeerFermentation::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Liste des fermentation";

// Load view
$actionView = "admin/fermentation/index.php";

// Load layout
include_once 'views/layouts/default.php';
