<?php

namespace App\Controllers;

use App\Models\Card;

class CoreController
{
    protected function show( $viewName, $viewData = [] )
    {
        global $router;

        $cardModel = new Card();

        extract($viewData);

        require_once __DIR__ . '/../Views/header.tpl.php';
        require_once __DIR__ . '/../Views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../Views/footer.tpl.php';
    }
}