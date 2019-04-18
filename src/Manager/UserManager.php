<?php

namespace App\Manager;

use App\Entity\User;

class UserManager
{
    /**
     * @param string $bet
     * @return string
     */
    public function getMise(string $bet) : string
    {
        $data = strstr($bet, '-', true);

        return $data ? $data.',' : '';
    }

    /**
     * @param string $bet
     * @return string
     */
    public function getNumber(string $bet) : string
    {
        $data = strstr($bet, '-', false);
        $data = substr($data, 1, strlen($data));

        return $data ? $data.',' : '';
    }
}
