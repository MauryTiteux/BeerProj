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

  if($beer_glass == null) {
    header('Location: /admin/glasses/index.php');
    die;
  }

  $view['beer_glass'] = $beer_glass;
  $view['form_fields'] = ["name"];

  // Include View
  // ===========================================================================

  // Set page title
  $metaPageTitle = "Admin - Modifier {$beer_glass->name}";

  // Load view
  $actionView = "admin/glasses/show.php";

  // Load layout
  include_once 'views/layouts/default.php';
?>
