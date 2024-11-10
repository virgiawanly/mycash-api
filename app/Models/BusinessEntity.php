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
}
