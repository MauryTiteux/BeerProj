<?php
  // Include models
  // ===========================================================================

  include_once 'models/beer.php';

  // Données
  // ===========================================================================

  //! HARDCODED: Fonction de récupération des données.
  //! A modifier avec acces DB.

  function userBeerAll() {
    $query = "SELECT * FROM utilisateurbieres";
    $userBeers = dbQuerySelect($query);

    // Retourne les enregistrements.
    return $userBeers;
  }

  function userBiereOfUser($id) {
    $userBeers = userBeerAll();
    $beers = [];
    foreach ($userBeers as $userBeer) {
      if($userBeer['idUtilisateur'] == $id) {
        array_push($beers, $userBeer);
        $beers[count($beers) - 1]['info'] = beerById($userBeer['IdBieres']);
      }
    }
    return $beers;
  }

  function userBiereAddDrink($userId, $beerId, $value = 1) {
    if(beerById($beerId) && userById($userId)) {
      $userBeers = userBeerAll();
      for ($i = 0; $i < count($userBeers); $i++) {
        if ($userBeers[$i]['idUtilisateur'] == $userId && $userBeers[$i]['IdBieres'] == $beerId) {
          $currentdate = date('Y-m-d H:i:s');
          $nbr = $userBeers[$i]['NombresBue'] + $value;
          $id = $userBeers[$i]['id'];
          $query = "UPDATE utilisateurbieres SET NombresBue='$nbr', LastDrink='$currentdate' WHERE id='$id'";
          dbQueryUpdate($query);
          return true;
        }
      }
      if (beerById($beerId)) {
        $currentdate = date('Y-m-d H:i:s');
        $query = "INSERT
          INTO utilisateurbieres (idUtilisateur, IdBieres, NombresBue, Note, Commentaire, FirstDrink, LastDrink, Fav)
          VALUES ('$userId', '$beerId', 1, null, null, '$currentdate', '$currentdate', 0)";
        dbQueryUpdate($query);
        return true;
      }
    }
    return false;
  }
?>
