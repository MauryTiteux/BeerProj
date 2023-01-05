<?php
  include_once 'models/user.php';

  // Verify if user is logged
  function currentUser() {
    if($_SESSION['user_id'] && $_SESSION['user_token']) {
      $user = userByIdAndToken($_SESSION['user_id'], $_SESSION['user_token']);
      return $user;
    }
  }

  // Ensure user is logged.
  function actionRequireUser() {
    if(!currentUser()) {
      sessionAlertAdd('error', "Vous devez être connecté pour accéder à cette page.");
      header('Location: /error404.php');
      die;
    }
  }

  // Ensure user is guest.
  function actionRequireGuest() {
    if(currentUser()) {
      sessionAlertAdd('error', "Vous ne pouvez pas être connecté pour accéder à cette page.");
      header('Location: /error404.php');
      die;
    }
  }

  // Ensure user is admin.
  function actionRequireAdmin() {
    if(currentUser() && currentUser()['RoleId'] != 2) {
      sessionAlertAdd('error', "Vous ne pouvez pas accéder à cette page.");
      header('Location: /error404.php');
      die;
    }
  }

?>
