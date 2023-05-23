<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = ['WAITING', 'APPROVED', 'COMPLETED'];
    const CREATE = 'CREATE_ORDER';
    const VIEW = 'VIEW_ORDER';
    const EDIT = 'EDIT_ORDER';
    const DELETE = 'DELETE_ORDER';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'shipping_id',
        'name',
        'email',
        'address',
        'phone_number',
        'notice',
        'total',
        'status',
        'order_update_date'
    ];

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'id','customer_id');
    }

    /**
     * @return BelongsTo
     */
    public function shippings(): BelongsTo
    {
        return $this->BelongsTo(Shipping::class, 'id', 'shipping_id');
    }

    /**
     * @return HasMany
     */
    public function orderdetails(): HasMany
    {
        return $this->HasMany(Order::class, 'order_id', 'id');
    }
}
