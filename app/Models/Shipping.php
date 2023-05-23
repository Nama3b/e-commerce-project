<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipping extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = ['PENDING', 'TRANSPORTING', 'COMPLETED', 'CANCELLED'];
    const CREATE = 'CREATE_SHIPPING';
    const VIEW = 'VIEW_SHIPPING';
    const EDIT = 'EDIT_SHIPPING';
    const DELETE = 'DELETE_SHIPPING';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shippings';

    /**
     * @var string[]
     */
    protected $fillable = [
        'delivery_id',
        'manager',
        'customer_name',
        'phone_number',
        'shipping_delivery_address',
        'shipping_delivery_time',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function delivery(): BelongsTo
    {
        return $this->BelongsTo(Delivery::class,'id', 'delivery_id');
    }

    /**
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->BelongsTo(Member::class,'id','manager');
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->HasMany(Order::class, 'shipping_id', 'id');
    }
}
