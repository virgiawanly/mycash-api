<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UniqueInUserBusiness implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string|null  $attribute
     * @return void
     */
    public function __construct(protected Model $model, protected string|null $attribute = null, protected string|null $businessIdColumnName = 'business_id') {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Auth::check()) {
            $user = request()->user();

            $dataExists = $this->model
                ->where($this->businessIdColumnName, $user->business_id)
                ->where($this->attribute ? $this->attribute : $attribute, $value)
                ->exists();

            if ($dataExists) {
                $fail('The :attribute already exists.');
            }
        }
    }
}
