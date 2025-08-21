<?php

namespace App\Services\Merchants\Interfaces;

use App\Models\Merchant;

interface MerchantInterface {
    public function createMerchant($data): Merchant;
    public function checkSign($data): bool;
    public function checkLimit($merchant_id): bool;
}