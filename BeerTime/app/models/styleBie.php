<?php
  function styleBieAll() {
    return [
      [
        'IDSty' => 1,
        'Style' => "Douce",
      ],
      [
        'IDSty' => 2,
        'Style' => "Amer",
      ],
    ];
  }

  function styleBieById($id) {
    $styles = styleBieAll();
    foreach ($styles as $style) {
      if($style['IDSty'] == $id) {
        return $style;
      }
    }
  }
?>
