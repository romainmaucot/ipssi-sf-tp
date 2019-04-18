<?php
/**
 * Created by PhpStorm.
 * User: loryleticee
 * Date: 2019-04-18
 * Time: 00:05
 */

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
