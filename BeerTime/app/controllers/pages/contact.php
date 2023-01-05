<?php
  // Include helpers
  // ===========================================================================

  include_once 'helpers/bootstrap.php';

  // Authorizations
  // ===========================================================================

  actionRequireMethodGet();
  actionRequireUser();

  // Include models
  // ===========================================================================

  // No models required.

  // Manage Logic
  // ===========================================================================

  // No Logic required.

  // Include View
  // ===========================================================================

  // Set page title
  $metaPageTitle = "Nous contacter";

  // Load view
  $actionView = "pages/contact.php";

  // Load layout
  include_once 'views/layouts/default.php';
?>
