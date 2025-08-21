<?php

namespace App\Services\Merchants;

use App\Services\Merchants\Merchant\MerchantOne;
use App\Services\Merchants\Merchant\MerchantTwo;

class MerchantFactory {

    public static function createMerchant($type){
        return match($type) {
            1 => new MerchantOne(),
            2 => new MerchantTwo()
        };
    }
}