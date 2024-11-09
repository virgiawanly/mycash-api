<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class BusinessScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $tableName = $model->getTable();

        if (Auth::check()) {
            $businessId = Auth::user()->business_id;
        } else {
            $businessId = $model->business_id;
        }

        $builder->where($tableName . '.' . ($model->businessIdColumn ?? 'business_id'), $businessId);
    }
}
