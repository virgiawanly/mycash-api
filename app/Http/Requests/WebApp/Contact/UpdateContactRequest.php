<?php

namespace App\Http\Requests\WebApp\Contact;

use App\Enums\ContactType;
use App\Models\ContactGroup;
use App\Rules\ExistsInUserBusiness;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateContactRequest extends FormRequest
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
            'contact_group_id' => ['nullable', new ExistsInUserBusiness(new ContactGroup(), 'id')],
            'is_vendor' => ['required'],
            'is_customer' => ['required', 'boolean'],
            'type' => ['required', Rule::in(ContactType::Individual->value, ContactType::Business->value)],
            'code' => ['nullable', 'max:100'],
            'business_name' => ['required_if:type,' . ContactType::Business->value, 'max:255'],
            'individual_title' => ['nullable', 'max:20'],
            'individual_name' => ['required_if:type,' . ContactType::Individual->value, 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'max:20'],
            'alternate_phone' => ['nullable', 'max:20'],
            'address' => ['nullable', 'max:500'],
            'city' => ['nullable', 'max:150'],
            'state' => ['nullable', 'max:150'],
            'country' => ['nullable', 'max:150'],
            'zipcode' => ['nullable', 'max:20'],
            'notes' => ['nullable', 'max:500'],
            'tax_identification_number' => ['nullable', 'max:30'],
            'accounts_payable_id' => ['nullable'],
            'accounts_receivable_id' => ['nullable'],
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
            'contact_group_id' => trans('validation.attributes.contact_group'),
        ];
    }
}
