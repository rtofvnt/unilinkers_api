<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        return [
            'name'          => 'required|unique:rooms,name',
            'property_id'   => 'required|exists:properties,id',
            'area_sqm'      => 'required_without:area_sqft|numeric',
            'area_sqft'     => 'required_without:area_sqm|numeric',
            
        ];
    }
}
