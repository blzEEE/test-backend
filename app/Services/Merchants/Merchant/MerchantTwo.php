<?php

namespace App\Services\Merchants\Merchant;

use Illuminate\Http\Exceptions\HttpResponseException;
use App\Services\Merchants\Interfaces\MerchantInterface;
use App\Models\Merchant;

class MerchantTwo implements MerchantInterface{

    public function createMerchant($data): Merchant{
        if(!$this->checkSign($data)){
            throw new HttpResponseException(
                response()->json(['error' => 'Invalid signature'], 400)
            );
        }
        if(!$this->checkLimit($data)){
            throw new HttpResponseException(
                response()->json(['error' => 'Limit was reached'], 400)
            );
        }
        $merchant = Merchant::create([
            'merchant_id' => $data['project'],
            'payment_id' => $data['invoice'],
            'amount' => $data['amount'],
            'amount_paid' => $data['amount_paid'],
            'status' => $data['status'],
        ]);
        return $merchant;
    }

    public function checkSign($data): bool{
        $sign = $data['sign'];
        unset($data['sign']);
        ksort($data);
        $hash = hash('md5', implode('.', $data) . env('app_key'), );
        if($sign === $hash){
            return true;
        }
        return false;
    }

    public function checkLimit($merchant_id): bool{
        $limit = env('app_amount_limit');
        $amount = Merchant::where('merchant_id', $merchant_id)
                        ->whereDate('created_at', date('Y-m-d'))
                        ->sum('amount');                
        if($amount > $limit){
            return false;
        }
        return true;
    }
}