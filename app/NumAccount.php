<?php

namespace App;

class NumAccount
{
    public static function generateNumAccount(int $user_id)
    {
        $date = date('dmy');
        $random = 0;
        for ($i = 0; $i < 7; $i++) {
            $random .= rand(0, 9);
        }
        $numAccount = "VOD-" . $user_id . "-" . $date . "#" . $random;

        return $numAccount;
    }
}
