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

  include 'models/userBeer.php';

  // Manage Logic
  // ===========================================================================

  $biereID =  $_GET["id"] ?: 0;
  if(userBiereAddDrink(currentUser()['id'], $biereID, 1)) {
    sessionAlertAdd('success', "Vous avez bien bu !");
    header('Location: /');
  } else {
    sessionAlertAdd('error', "Cette bière n'est pas référencée.");
    header('Location: /');
  };
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
