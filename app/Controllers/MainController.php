<?php

namespace App\Controllers;

use App\Models\Card;

class MainController extends CoreController
{
  public function home()
  {
    $cardModel  = new Card();
    $homeCards = $cardModel->findAll();

    $this->show( "home", [
      "homeCards"  => $homeCards,
    ] );
  }

}