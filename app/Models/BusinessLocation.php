<?php

namespace App\Models;

use App\Traits\ScopedByBusiness;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessLocation extends BaseModel
{
    use SoftDeletes, ScopedByBusiness;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'business_locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_id',
        'business_entity_id',
        'name',
        'code',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'pic_id',
        'pic_name',
        'pic_email',
        'pic_phone',
    ];

    /**
     * The attributes that are searchable in the query.
     *
     * @var array<int, string>
     */
    protected $searchables = [
        'name',
        'code',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
    ];

    /**
     * The columns that are searchable in the query.
     *
     * @var array<string, string>
     */
    protected $searchableColumns = [
        'business_entity_id' => '=',
        'name' => 'like',
        'code' => 'like',
        'address' => 'like',
        'city' => 'like',
        'state' => 'like',
        'country' => 'like',
        'zipcode' => 'like',
    ];
}
