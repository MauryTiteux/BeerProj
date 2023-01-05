<?php
  // Include helpers
  // ===========================================================================

  include_once 'helpers/bootstrap.php';

  // Authorizations
  // ===========================================================================

  actionRequireMethodGet();
  actionRequireGuest();

  // Include models
  // ===========================================================================

  // No required models

  // Manage Logic
  // ===========================================================================

  // No required logic

  // Include View
  // ===========================================================================

  // Set page title
  $metaPageTitle = "Connexion";

  // Load view
  $actionView = "sessions/new.php";

  // Load layout
  include_once 'views/layouts/default.php';
?>
