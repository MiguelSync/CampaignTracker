<?php

namespace App\Enum;

enum CampaignUserEnum
{
      const ROLE_OWNER  = 1,
            ROLE_MEMBER = 2;

      const STATUS_PENDING  = 1,
            _STATUS_PENDING = 'Pending',
            STATUS_ACTIVE   = 2,
            _STATUS_ACTIVE  = 'Active';

      public static function getListaStatus() {
            return [
                  ['id' => self::STATUS_PENDING, 'description' => self::_STATUS_PENDING],
                  ['id' => self::STATUS_ACTIVE, 'description' => self::_STATUS_ACTIVE],
            ];
      }
}
