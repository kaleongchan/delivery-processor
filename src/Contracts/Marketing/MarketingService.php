<?php

namespace App\Contracts\Marketing;

interface MarketingService
{
    public function verifyEmailCampaign($campaign) : bool;
}