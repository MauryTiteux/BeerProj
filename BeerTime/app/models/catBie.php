<?php
  function catBieAll() {
    return [
      [
        'IDCat' => 1,
        'NomCat' => "simple",
      ],
      [
        'IDCat' => 2,
        'NomCat' => "double",
      ],
      [
        'IDCat' => 3,
        'NomCat' => "triple",
      ],
      [
        'IDCat' => 4,
        'NomCat' => "quadruple",
      ],
    ];
  }

  function catBieById($id) {
    $categories = catBieAll();
    foreach ($categories as $categorie) {
      if($categorie['IDCat'] == $id) {
        return $categorie;
      }
    }
  }
?>
