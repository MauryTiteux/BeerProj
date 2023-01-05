<?php
  // Include models
  // ===========================================================================

  include_once 'models/styleBie.php';
  include_once 'models/catBie.php';

  // Données
  // ===========================================================================

  //! HARDCODED: Fonction de récupération des données.
  //! A modifier avec acces DB.

  function beerAll() {
    $query = "SELECT * FROM bieres";
    $beers = dbQuerySelect($query);

    // Récupère le nom du style et de la categorie et on l'injecte dans l'enregistrement.
    // for ($i = 0; $i < count($beers); $i++) {
    //   $beers[$i]['StyBieName'] = styleBieById($beers[$i]['StyBieID'])['Style'];
    //   $beers[$i]['CatBieName'] = catBieById($beers[$i]['CatBieID'])['NomCat'];
    // }

    // Retourne les enregistrements.
    return $beers;
  }

  function beerByAlcool($alcool) {
    $beers = beerAll();
    $beersAlcool = [];
    foreach ($beers as $beer) {
      if($beer['Alc'] >= $alcool) { array_push($beersAlcool, $beer); }
    }
    return $beersAlcool;
  }

  function beerById($id) {
    $beers = beerAll();
    foreach ($beers as $beer) {
      if($beer['ID'] == $id) { return $beer; }
    }
    return null;
  }
?>
