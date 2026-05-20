<?php

namespace App\Enum;

enum CampaignEnum
{
    const STATUS_PENDING    = 1,
          _STATUS_PENDING   = 'Pending',
          STATUS_FINALIZED  = 2,
          _STATUS_FINALIZED = 'Finalized';

    public static function getListRole() {
        return [
            ['id' => self::STATUS_PENDING , 'description' => self::_STATUS_PENDING],
            ['id' => self::STATUS_FINALIZED, 'description' => self::_STATUS_FINALIZED],
        ];
    }
}