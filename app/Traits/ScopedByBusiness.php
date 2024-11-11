<?php

namespace App\Traits;

use App\Models\Scopes\BusinessScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait ScopedByBusiness
{
    /**
     * Boot the scoped user business.
     */
    protected static function bootScopedByBusiness(): void
    {
        // Add global scope for query
        static::addGlobalScope(new BusinessScope);

        // Auto fill business id on create new model
        static::creating(function (Model $model) {
            if (Auth::check()) {
                $model->business_id = Auth::user()->business_id;
            }
        });
    }

    /**
     * Disable the business scope.
     */
    public static function withoutBusinessScope(): mixed
    {
        return (new static)->newQueryWithoutScope(new BusinessScope);
    }
}
