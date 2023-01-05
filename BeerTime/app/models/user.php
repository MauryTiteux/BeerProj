<?php
  // Include models
  // ===========================================================================

  // No models required.

  // Données
  // ===========================================================================

  //! HARDCODED: Fonction de récupération des données.
  //! A modifier avec acces DB.

  function userAll() {
    $query = "SELECT * FROM utilisateur";
    $users = dbQuerySelect($query);
    return $users;
  }

  function userById($id) {
    $users = userAll();
    foreach ($users as $user) {
      if($user['id'] == $id) { return $user; }
    }
    return null;
  }

  function userByPseudo($pseudo) {
    $users = userAll();
    foreach ($users as $user) {
      if($user['Pseudo'] == $pseudo) { return $user; }
    }
    return null;
  }

  function userByIdAndToken($id, $token) {
    $user = userById($id);
    if($user && $user['Token'] == $token) {
      return $user;
    }
    return null;
  }

  function userByPseudoAndPassword($pseudo, $password) {
    $user = userByPseudo($pseudo);
    if($user) {
      return $user['Mdp'] == $password ? $user : null;
    }
    return null;
  }
?>
