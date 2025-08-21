<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Merchantrequest;
use App\Services\MerchantService;

class MerchantController extends Controller
{
    public function __construct(
        protected MerchantService $merchantService
    ){}
    
    public function store(Merchantrequest $request){
        return $this->merchantService->store($request);
    }
}
