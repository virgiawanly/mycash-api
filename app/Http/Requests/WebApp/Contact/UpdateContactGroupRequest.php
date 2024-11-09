<?php

namespace App\Http\Requests\WebApp\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactGroupRequest extends FormRequest
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
            'business_entity_id' => ['required'],
            'name' => ['required', 'max:255'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'business_entity_id' => trans('validation.attributes.business_entity'),
            'name' => trans('validation.attributes.name'),
        ];
    }
}
