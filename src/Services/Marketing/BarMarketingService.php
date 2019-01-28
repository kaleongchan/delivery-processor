<?php

namespace App\Services\Marketing;

use App\Contracts\Marketing\MarketingService;

class BarMarketingService implements MarketingService
{
    public function verifyEmailCampaign($campaign) : bool
    {
        // @todo implementation

        return true;
    }
}