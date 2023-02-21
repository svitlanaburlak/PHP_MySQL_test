<?php

namespace App\Controllers;

use App\Models\Card;

class MainController extends CoreController
{
    /**
        * @return void
        */
    public function home()
    {
        $this->show( "home", [
            'cards'  => Card::findAll(),
        ] );
    }

}