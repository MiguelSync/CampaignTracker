<?php

namespace App\Enum\CampaignUser;

enum CampaignUserRoleEnum: int
{
    case ROLE_OWNER  = 1;
    case ROLE_MEMBER = 2;

    public function description(): string {
      return match($this) {
          self::ROLE_OWNER  => 'Owner',
          self::ROLE_MEMBER => 'Member',
          default           => 'Não Informado' 
      };
    }

    public static function getListRole() {
          return [
                ['id' => self::ROLE_OWNER , 'description' => 'Owner'],
                ['id' => self::ROLE_MEMBER, 'description' => 'Member'],
          ];
    }
}
