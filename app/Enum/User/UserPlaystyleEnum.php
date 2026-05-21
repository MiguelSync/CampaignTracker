<?php

namespace App\Enum\User;

enum UserPlaystyleEnum: int
{
    case PLAYSTYLE_CASUAL    = 1;
    case PLAYSTYLE_HARDCORE  = 2;

    public function description(): string {
        return match($this) {
            self::PLAYSTYLE_CASUAL   => 'Casual',
            self::PLAYSTYLE_HARDCORE => 'Hardcore',
            default                  => 'Não Informado' 
        };
    }

    public static function getListPlaystyle() {
        return [
            ['id' => self::PLAYSTYLE_CASUAL , 'description'  => 'Casual'],
            ['id' => self::PLAYSTYLE_HARDCORE, 'description' => 'Harcore'],
        ];
    }
}
