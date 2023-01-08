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

$beer_glass = new BeerGlass();

$view['beer_glass'] = $beer_glass;
$view['form_fields'] = ["name"];

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Admin - Ajouter un format";

// Load view
$actionView = "admin/glasses/new.php";

// Load layout
include_once 'views/layouts/default.php';
