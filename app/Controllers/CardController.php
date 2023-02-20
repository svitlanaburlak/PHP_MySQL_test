<?php

namespace App\Controllers;

use App\Models\Card;

class CardController extends CoreController
{
  public function list()
  {
    $cardModel  = new Card();
    $homeCards = $cardModel->findAll();

    $this->show( "home", [
        "homeCards"  => $homeCards,
    ] );
  }

  public function create()
  {

  }

  public function update()
  {

  }

}