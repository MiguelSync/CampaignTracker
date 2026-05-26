<?php

namespace App\Enum\CampaignUser;

enum CampaignUserStatusEnum: int
{
    case STATUS_PENDING = 1;
    case STATUS_ACTIVE  = 2;

    public function description(): string {
      return match($this) {
          self::STATUS_PENDING => 'Pending',
          self::STATUS_ACTIVE  => 'Active',
          default              => 'Não Informado' 
      };
    }

    public static function getListStatus() {
          return [
                ['id' => self::STATUS_PENDING, 'description' => 'Pending'],
                ['id' => self::STATUS_ACTIVE, 'description' => 'Active'],
          ];
    }
}
