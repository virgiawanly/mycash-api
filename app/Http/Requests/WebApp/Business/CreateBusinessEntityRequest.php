<?php

namespace App\Http\Requests\WebApp\Business;

use App\Models\BusinessEntity;
use App\Rules\UniqueInUserBusiness;
use Illuminate\Foundation\Http\FormRequest;

class CreateBusinessEntityRequest extends FormRequest
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
            'code' => ['required', new UniqueInUserBusiness(new BusinessEntity(), 'code'), 'max:255'],
            'name' => ['required', 'max:255'],
        ];
    }
}
