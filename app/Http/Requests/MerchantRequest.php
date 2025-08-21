<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MerchantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'merchant_id' => ['integer'],
            'project' => ['integer'],

            'payment_id' => ['integer'],
            'invoice' => ['integer'],

            'status' => ['required', 'string'],
            'amount' => ['required', 'integer'],
            'amount_paid' => ['required', 'integer'],

            'timestamps' => ['integer'],
            'sign' => ['string'],
            'rand' =>['string']
        ];

        return $rules;
    }
}
