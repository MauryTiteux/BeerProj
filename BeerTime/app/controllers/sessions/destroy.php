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

  $_SESSION['user_id'] = null;
  $_SESSION['user_token'] = null;
  sessionAlertAdd('success', "Bravo, vous êtes déconnecté.");
  header('Location: /');
  die;

  // Include View
  // ===========================================================================

  // Set page title
  // $metaPageTitle = "";

  // Load view
  // $actionView = "";

  // Load layout
  // include_once '';
?>
