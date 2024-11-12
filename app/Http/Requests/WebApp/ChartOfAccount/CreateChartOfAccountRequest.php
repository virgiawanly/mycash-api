<?php

namespace App\Http\Requests\WebApp\ChartOfAccount;

use App\Enums\ChartOfAccountType;
use App\Models\BusinessEntity;
use App\Models\ChartOfAccount;
use App\Rules\ExistsInUserBusiness;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateChartOfAccountRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'code' => ['required', 'max:255'],
            'type' => ['required', Rule::in(array_column(ChartOfAccountType::cases(), 'value'))],
            'parent_id' => ['nullable', 'sometimes', new ExistsInUserBusiness(new ChartOfAccount(), 'id')],
            'description' => ['nullable', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'business_entity_ids' => ['nullable', 'array'],
            'business_entity_ids.*' => [new ExistsInUserBusiness(new BusinessEntity(), 'id')],
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
            'parent_id' => trans('validation.attributes.parent_account'),
            'business_entity_ids' => trans('validation.attributes.business_entities'),
        ];
    }
}
