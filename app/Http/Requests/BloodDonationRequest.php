<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BloodDonationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'donor_name' => 'required|string|max:255',
            'blood_group' => 'required',
            'donation_date' => 'required',
            'quantity_ml' => 'required|regex:/^\d+(\.\d{1,2})?$/|min:0|max:1000000',

        ];
    }
}
