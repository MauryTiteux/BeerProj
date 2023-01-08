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

$view['beer_glasses'] = BeerGlass::all();

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Liste des formats";

// Load view
$actionView = "admin/glasses/index.php";

// Load layout
include_once 'views/layouts/default.php';
