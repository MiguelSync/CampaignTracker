<?php

namespace App\Enum;

enum UserEnum
{
    const PLAYSTYLE_CASUAL    = 1,
          _PLAYSTYLE_CASUAL   = 'Casual', 
          PLAYSTYLE_HARDCORE  = 2,
          _PLAYSTYLE_HARDCORE = 'Hardcore';

    public static function getListPlaystyle() {
        return [
            ['id' => self::PLAYSTYLE_CASUAL  , 'description' => self::_PLAYSTYLE_CASUAL],
            ['id' => self::PLAYSTYLE_HARDCORE, 'description' => self::_PLAYSTYLE_HARDCORE],
        ];
    }
}
