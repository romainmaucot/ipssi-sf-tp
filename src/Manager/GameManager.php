<?php

namespace App\Manager;

use App\Entity\User;
use App\Entity\Game;


class GameManager extends Game
{
    public function payed(User $user, float $gain = 0) :void
    {
       $initAmount  =  $user->getAmount();
       $newAmount   = $user->setAmount(($gain + $initAmount));
       $this->setAmount($this->getAmount() - $newAmount);
    }
}
