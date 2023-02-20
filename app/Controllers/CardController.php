<?php

namespace App\Controllers;

use App\Models\Card;

class CardController extends CoreController
{
  public function read(int $id)
  {
    $card = Card::find($id);
  
    $this->show( "single", [
        "card"  => $card,
    ] );
  }

  public function create()
  {
    
  }

  public function update()
  {

  }

}