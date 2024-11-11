<?php

namespace App\Models;

use App\Traits\ScopedByBusiness;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessEntity extends BaseModel
{
    use SoftDeletes, ScopedByBusiness;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_entities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_id',
        'name',
        'code'
    ];

    /**
     * The attributes that are searchable in the query.
     *
     * @var array<int, string>
     */
    protected $searchables = [
        'name',
        'code',
    ];

    /**
     * The columns that are searchable in the query.
     *
     * @var array<string, string>
     */
    protected $searchableColumns = [
        'name' => 'like',
        'code' => 'like',
    ];
}
