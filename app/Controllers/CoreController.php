<?php

namespace App\Controllers;

use App\Models\Card;

class CoreController
{
    protected function show( $viewName, $viewData = [] )
    {
      global $router;

      $cardModel = new Card();
      $allCards = $cardModel->findAll();

      // var_dump( get_defined_vars() );
      // var_dump($viewData);
      extract($viewData);

      require_once __DIR__ . '/../Views/header.tpl.php';
      require_once __DIR__ . '/../Views/' . $viewName . '.tpl.php';
      require_once __DIR__ . '/../Views/footer.tpl.php';
    }
}