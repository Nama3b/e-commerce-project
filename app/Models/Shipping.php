<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Shipping
 *
 * @property int $id
 * @property int $delivery_id
 * @property int $manager
 * @property string $customer_name
 * @property string $shipping_delivery_address
 * @property string $phone_number
 * @property string $shipping_delivery_time
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Delivery|null $delivery
 * @property-read Member|null $member
 * @property-read Collection<int, Order> $orders
 * @property-read int|null $orders_count
 * @method static Builder|Shipping newModelQuery()
 * @method static Builder|Shipping newQuery()
 * @method static Builder|Shipping onlyTrashed()
 * @method static Builder|Shipping query()
 * @method static Builder|Shipping whereCreatedAt($value)
 * @method static Builder|Shipping whereCustomerName($value)
 * @method static Builder|Shipping whereDeletedAt($value)
 * @method static Builder|Shipping whereDeliveryId($value)
 * @method static Builder|Shipping whereId($value)
 * @method static Builder|Shipping whereManager($value)
 * @method static Builder|Shipping wherePhoneNumber($value)
 * @method static Builder|Shipping whereShippingDeliveryAddress($value)
 * @method static Builder|Shipping whereShippingDeliveryTime($value)
 * @method static Builder|Shipping whereStatus($value)
 * @method static Builder|Shipping whereUpdatedAt($value)
 * @method static Builder|Shipping withTrashed()
 * @method static Builder|Shipping withoutTrashed()
 * @mixin Eloquent
 */
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
