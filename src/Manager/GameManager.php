<?php

namespace App\Manager;

use App\Entity\User;
use App\Entity\Game;

class GameManager extends Game
{

    /**
     * @param User $user
     * @param int|null $gain
     */
    public function payed(User $user, int $gain = null) :void
    {
        $initAmount  =  (int)$user->getAmount();
        $user->setAmount(($gain + $initAmount));
    }
}
