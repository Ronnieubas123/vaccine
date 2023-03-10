<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVaccineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
            'dosage' => 'nullable|string',
            'description' => 'nullable|string',
            'manufacturer' => 'nullable|string',
            'type' => 'nullable|string',
            'image' => 'string|nullable'
        ]; 
    }
}
