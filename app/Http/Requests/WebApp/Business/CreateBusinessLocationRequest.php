<?php

namespace App\Http\Requests\WebApp\Business;

use App\Models\BusinessEntity;
use App\Models\BusinessLocation;
use App\Models\User;
use App\Rules\ExistsInUserBusiness;
use App\Rules\UniqueInUserBusiness;
use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessLocationRequest extends FormRequest
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
            'business_entity_id' => ['required', new ExistsInUserBusiness(new BusinessEntity(), 'id')],
            'code' => ['required', new UniqueInUserBusiness(new BusinessLocation(), 'code'), 'max:255'],
            'name' => ['required', 'max:255'],
            'address' => ['nullable', 'max:500'],
            'city' => ['nullable', 'max:150'],
            'state' => ['nullable', 'max:150'],
            'country' => ['nullable', 'max:150'],
            'zipcode' => ['nullable', 'max:20'],
            'pic_id' => ['nullable', new ExistsInUserBusiness(new User(), 'id')],
            'pic_name' => ['nullable', 'max:255'],
            'pic_email' => ['nullable', 'sometimes', 'email', 'max:255'],
            'pic_phone' => ['nullable', 'max:20'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes()
    {
        return [
            'business_entity_id' => trans('validation.attributes.business_entity'),
            'pic_id' => trans('validation.attributes.pic'),
        ];
    }
}
