<?php

namespace App\Enum;

enum CampaignUserEnum
{
    const ROLE_OWNER  = 1,
          ROLE_MEMBER = 2;

    const STATUS_PENDING   = 1,
          STATUS_ACTIVE = 2;
}
