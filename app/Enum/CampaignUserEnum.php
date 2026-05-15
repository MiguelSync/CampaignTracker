<?php

namespace App\Enum;

enum CampaignUserEnum
{
      const ROLE_OWNER   = 1,
            _ROLE_OWNER  = 'Owner',
            ROLE_MEMBER  = 2,
            _ROLE_MEMBER = 'Member';

      const STATUS_PENDING  = 1,
            _STATUS_PENDING = 'Pending',
            STATUS_ACTIVE   = 2,
            _STATUS_ACTIVE  = 'Active';

      public static function getListRole() {
            return [
                  ['id' => self::ROLE_OWNER , 'description' => self::_ROLE_OWNER],
                  ['id' => self::ROLE_MEMBER, 'description' => self::_ROLE_MEMBER],
            ];
      }

      public static function getListStatus() {
            return [
                  ['id' => self::STATUS_PENDING, 'description' => self::_STATUS_PENDING],
                  ['id' => self::STATUS_ACTIVE, 'description' => self::_STATUS_ACTIVE],
            ];
      }
}
