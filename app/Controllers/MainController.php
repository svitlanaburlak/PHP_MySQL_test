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
    // var_dump(Card::findAll());

    $this->show( "home", [
        'cards'  => Card::findAll(),
    ] );
  }

}