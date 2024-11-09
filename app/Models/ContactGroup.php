<?php

namespace App\Models;

use App\Traits\ScopedByBusiness;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactGroup extends BaseModel
{
    use SoftDeletes, ScopedByBusiness;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contact_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_id',
        'business_entity_id',
        'name'
    ];
}
