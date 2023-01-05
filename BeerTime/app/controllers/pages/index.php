<?php
  // Include helpers
  // ===========================================================================

  include_once 'helpers/bootstrap.php';

  // Authorizations
  // ===========================================================================

  actionRequireMethodGet();

  // Include models
  // ===========================================================================

  include_once 'models/beer.php';
  include_once 'models/userBeer.php';

  // Manage Logic
  // ===========================================================================

  if(currentUser()) {
  //   $name = bin2hex(openssl_random_pseudo_bytes(10));
  //   $query = "UPDATE bieres SET NomBie='$name' WHERE id=1";
  //   dbQueryUpdate($query);
    $view['beersOfUser'] = userBiereOfUser(currentUser()['id']);
  }

  $view['beers'] = beerAll();

  // Include View
  // ===========================================================================

  // Set page title
  $metaPageTitle = "Accueil";

  // Load view
  $actionView = "pages/index.php";

  // Load layout
  include_once 'views/layouts/default.php';
?>
