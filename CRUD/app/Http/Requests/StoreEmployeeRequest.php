<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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

            'full_name' => "required|min:4",
            'contact_number' => 'required|digits:10',
            'email' => 'required|email',
            'permanent_address' => 'required',
            'temporary_address' => 'required',
            'dep_id' => 'required|exists:departments,dep_id',
            'desig_id' => 'required|exists:designations,desig_id',
        
            

        
        ];
    }
}
