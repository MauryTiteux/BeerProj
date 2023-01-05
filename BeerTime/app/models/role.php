<?php
  // Include models
  // ===========================================================================

  // No models required

  // Données
  // ===========================================================================

  //! HARDCODED: Fonction de récupération des données.
  //! A modifier avec acces DB.

  function roleAll() {
    $roles = [
      [
        'id' => 1,
        'role' => "User"
      ],
      [
        'id' => 2,
        'role' => "Admin"
      ],
    ];

    // Retourne les enregistrements.
    return $roles;
  }

  function roleById($id) {
    $roles = roleAll();
    foreach ($roles as $role) {
      if($role['ID'] == $id) { return $role; }
    }
    return null;
  }
?>
