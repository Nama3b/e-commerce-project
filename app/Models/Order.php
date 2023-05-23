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
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $shipping_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $address
 * @property string|null $phone_number
 * @property string $notice
 * @property float $total
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Customer|null $customer
 * @property-read Collection<int, Order> $orderdetails
 * @property-read int|null $orderdetails_count
 * @property-read Shipping|null $shippings
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order onlyTrashed()
 * @method static Builder|Order query()
 * @method static Builder|Order whereAddress($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCustomerId($value)
 * @method static Builder|Order whereDeletedAt($value)
 * @method static Builder|Order whereEmail($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereName($value)
 * @method static Builder|Order whereNotice($value)
 * @method static Builder|Order wherePhoneNumber($value)
 * @method static Builder|Order whereShippingId($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTotal($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order withTrashed()
 * @method static Builder|Order withoutTrashed()
 * @mixin Eloquent
 */
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
