<?php

namespace App\Manager;

use App\Entity\User;
use App\Repository\UserRepository;

class UserManager
{
    /**
     * @param string $bet
     * @return string
     */
    public function getMise(?string $bet = null) : string
    {
        $data = strstr($bet, '-', true);

        return $data ? $data.',' : '';
    }

    /**
     * @param string $bet
     * @return string
     */
    public function getNumber(?string $bet = null) : string
    {
        $data = strstr($bet, '-', false);
        $data = substr($data, 1, strlen($data));

        return $data ? $data.',' : '';
    }

    public function potentialGain(UserRepository $userRepository)
    {
       /*
       $aPlayer =  $userRepository->nextPlayers();
       foreach ($aPlayer as $player) {
           $total[] +=;
       }*/
    }
    public function tableGain(UserRepository $userRepository) : float
    {
        $aPlayer =  $userRepository->nextPlayers();
        $total   = 0 ;

        if (is_null($aPlayer)) {
            return $total;
        }
        foreach ($aPlayer as $player) {
            $total  += $player->getNexBet();
        }

        return $total;
    }
}
