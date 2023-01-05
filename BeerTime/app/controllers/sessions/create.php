<?php
  // Include helpers
  // ===========================================================================

  include_once 'helpers/bootstrap.php';

  // Authorizations
  // ===========================================================================

  actionRequireMethodPost();
  actionRequireGuest();

  // Include models
  // ===========================================================================

  include_once 'models/user.php';

  // Manage Logic
  // ===========================================================================

  $pseudo = $_POST['user_pseudo'];
  $password = $_POST['user_password'];

  // Try to find user by data posted
  $user = userByPseudoAndPassword($pseudo, $password);

  if($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_token'] = $user['Token'];
    sessionAlertAdd('success', "Bravo, vous êtes connecté.");
    header('Location: /');
    die;
  }

  sessionAlertAdd('error', "Identifiants incorects");
  $view['user_pseudo'] = $pseudo;

  // Include View
  // ===========================================================================

  // Set page title
  $metaPageTitle = "Connexion";

  // Load view
  $actionView = "sessions/new.php";

  // Load layout
  include_once 'views/layouts/default.php';
?>
