<?php

namespace App\Enum\Campaign;

enum CampaignStatusEnum: int
{
    case STATUS_PENDING   = 1;
    case STATUS_FINALIZED = 2;

    public static function getListStatus() {
        return [
            ['id' => self::STATUS_PENDING , 'description' => 'Pending'],
            ['id' => self::STATUS_FINALIZED, 'description' => 'Finalized'],
        ];
    }
}