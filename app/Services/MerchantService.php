<?php

namespace App\Services;

use App\Models\Merchant;
use App\Services\Merchants\MerchantFactory;

class MerchantService{

    public function __construct(private MerchantFactory $merchantFactory)
    {}

    public function store($request){
        $data = $request->all();
        $merchant;
        if(isset($data['merchant_id'])){
            $merchant = MerchantFactory::createMerchant(1);
        } else if(isset($data['project'])){
            $data['sign'] = $request->bearerToken();
            $merchant = MerchantFactory::createMerchant(2);
        } else {
            response()->json(['error' => 'There is no merchant']);
        }

        return $merchant->createMerchant($data);
    }
}