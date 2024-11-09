<?php

namespace App\Models;

use App\Traits\ScopedByBusiness;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends BaseModel
{
    use SoftDeletes, ScopedByBusiness;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_id',
        'business_entity_id',
        'contact_group_id',
        'is_vendor',
        'is_customer',
        'type',
        'code',
        'business_name',
        'individual_title',
        'individual_name',
        'email',
        'phone',
        'alternate_phone',
        'address',
        'city',
        'state',
        'country',
        'zipcode',
        'notes',
        'tax_identification_number',
        'accounts_payable_id',
        'accounts_receivable_id'
    ];

    /**
     * Get the group of the contact.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactGroup(): BelongsTo
    {
        return $this->belongsTo(ContactGroup::class);
    }

    /**
     * Scope a query to only include vendors.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyVendors(Builder $query): Builder
    {
        return $query->where('is_vendor', true);
    }

    /**
     * Scope a query to only include customers.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyCustomers(Builder $query): Builder
    {
        return $query->where('is_customer', true);
    }
}
