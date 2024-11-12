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
     * The attributes that should be appended to the model.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'option_label',
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
     * The searchables for the query.
     *
     * @return array
     */
    protected function getCustomSearchables()
    {
        return [
            'business_entity' => function ($query, $value) {
                $query->whereHas('businessEntity', function ($query) use ($value) {
                    $query->where('name', 'like', '%' . $value . '%')
                        ->orWhere('code', 'like', '%' . $value . '%');
                });
            },
        ];
    }

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

    /**
     * The columns that are sortable in the query.
     *
     * @var array<int, string>
     */
    protected $sortableColumns = [
        'name',
        'code',
    ];

    /**
     * The custom sortables query.
     *
     * @return array
     */
    protected function getCustomSortables()
    {
        return [
            'business_entity' => function ($query, $direction) {
                $query->join('business_entities as business_entities_sort', 'business_locations.business_entity_id', '=', 'business_entities_sort.id')
                    ->orderBy('business_entities_sort.name', $direction);
            }
        ];
    }

    /**
     * Get the business entity that owns the business location.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessEntity()
    {
        return $this->belongsTo(BusinessEntity::class, 'business_entity_id');
    }

    /**
     * Get the label for the business location.
     *
     * @return string
     */
    public function getOptionLabelAttribute()
    {
        return $this->code . ' - ' . $this->name;
    }
}
