<?php
// Dependencies
// ===========================================================================

require_once 'models/bootstrap.php';
require_once 'helpers/bootstrap.php';

// Authorizations
// ===========================================================================

actionRequireMethodPost();
actionRequireGuest();

// Manage Logic
// ===========================================================================

$form['username'] = $_POST['user_username'];
$form['email'] = $_POST['user_email'];
$form['password'] = $_POST['user_password'];

$user = new User();
$user->username = $form['username'];
$user->email = $form['email'];
$user->password = $form['password'];
if ($user->isValid()) {
  $user->create();
  flashAdd('success', "Vous vous êtes inscrit, vous pouvez maintenant vous connecter {$user->username}");
  header('Location: /sessions/new.php');
  die;
} else {
  foreach ($user->errors as $error) {
    flashAdd('error', $error[key($error)]);
  }
}

// Include View
// ===========================================================================

// Set page title
$metaPageTitle = "Inscription";

// Load view
$actionView = "users/new.php";

// Load layout
include_once 'views/layouts/default.php';
